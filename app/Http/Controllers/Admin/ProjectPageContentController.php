<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProjectPageContent;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ProjectPageContentController extends Controller
{
    public function index()
    {
        $contents = ProjectPageContent::orderBy('section_type')
                                    ->orderBy('order')
                                    ->paginate(15);
        
        return view('admin.project-page-content.index', compact('contents'));
    }

    public function create()
    {
        $sectionTypes = ProjectPageContent::SECTION_TYPES;
        return view('admin.project-page-content.create', compact('sectionTypes'));
    }

    public function store(Request $request)
    {
        $allowedTypes = array_keys(ProjectPageContent::SECTION_TYPES);
        
        $validator = Validator::make($request->all(), [
            'section_type' => 'required|string|in:' . implode(',', $allowedTypes),
            'content_data' => 'required|array',
            'is_active' => 'boolean',
            'order' => 'integer|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $validated = $validator->validated();
        $validated['is_active'] = $request->boolean('is_active', true);
        $validated['order'] = $request->get('order', 0);

        ProjectPageContent::create($validated);

        return redirect()->route('admin.project-page-content.index')
            ->with('success', 'Project page content created successfully.');
    }

    public function show(ProjectPageContent $projectPageContent)
    {
        return view('admin.project-page-content.show', compact('projectPageContent'));
    }

    public function edit(ProjectPageContent $projectPageContent)
    {
        $sectionTypes = ProjectPageContent::SECTION_TYPES;
        return view('admin.project-page-content.edit', compact('projectPageContent', 'sectionTypes'));
    }

    public function update(Request $request, ProjectPageContent $projectPageContent)
    {
        $allowedTypes = array_keys(ProjectPageContent::SECTION_TYPES);
        
        $validator = Validator::make($request->all(), [
            'section_type' => 'required|string|in:' . implode(',', $allowedTypes),
            'content_data' => 'required|array',
            'is_active' => 'boolean',
            'order' => 'integer|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $validated = $validator->validated();
        $validated['is_active'] = $request->boolean('is_active', true);
        $validated['order'] = $request->get('order', 0);

        $projectPageContent->update($validated);

        return redirect()->route('admin.project-page-content.index')
            ->with('success', 'Project page content updated successfully.');
    }

    public function destroy(ProjectPageContent $projectPageContent)
    {
        $projectPageContent->delete();

        return redirect()->route('admin.project-page-content.index')
            ->with('success', 'Project page content deleted successfully.');
    }

    public function toggleStatus(ProjectPageContent $projectPageContent)
    {
        $projectPageContent->update(['is_active' => !$projectPageContent->is_active]);
        
        $status = $projectPageContent->is_active ? 'activated' : 'deactivated';
        
        return back()->with('success', "Content {$status} successfully.");
    }

    public function reorder(Request $request): JsonResponse
    {
        $request->validate([
            'items' => 'required|array',
            'items.*.id' => 'required|integer|exists:project_page_content,id',
            'items.*.order' => 'required|integer|min:0',
        ]);

        foreach ($request->items as $item) {
            ProjectPageContent::where('id', $item['id'])
                ->update(['order' => $item['order']]);
        }

        return response()->json(['message' => 'Order updated successfully.']);
    }

    public function getPreview(Request $request): JsonResponse
    {
        $allowedTypes = array_keys(ProjectPageContent::SECTION_TYPES);
        
        $request->validate([
            'section_type' => 'required|string|in:' . implode(',', $allowedTypes),
            'content_data' => 'required|array',
        ]);

        // This method can be used for live preview functionality
        return response()->json([
            'preview' => $this->renderPreview($request->section_type, $request->content_data)
        ]);
    }

    private function renderPreview(string $sectionType, array $contentData): string
    {
        switch ($sectionType) {
            case 'hero_stats':
                return view('admin.project-page-content.previews.hero-stats', ['data' => $contentData])->render();
            
            case 'filter_buttons':
                return view('admin.project-page-content.previews.filter-buttons', ['data' => $contentData])->render();
            
            case 'project_types':
                return view('admin.project-page-content.previews.project-types', ['data' => $contentData])->render();
            
            case 'process_steps':
                return view('admin.project-page-content.previews.process-steps', ['data' => $contentData])->render();
            
            case 'cta_section':
                return view('admin.project-page-content.previews.cta-section', ['data' => $contentData])->render();
            
            default:
                return '<p>Preview not available for this section type.</p>';
        }
    }

    /**
     * Get content for frontend API endpoint
     */
    public function getContent(): JsonResponse
    {
        $data = [
            'hero_stats' => ProjectPageContent::getHeroStats(),
            'filter_buttons' => ProjectPageContent::getFilterButtons(),
            'project_types' => ProjectPageContent::getProjectTypes(),
            'process_steps' => ProjectPageContent::getProcessSteps(),
            'cta_section' => ProjectPageContent::getCtaSection(),
        ];

        return response()->json($data);
    }
}