<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        return view('admin.about.index');
    }

    public function getContentFields(string $sectionType)
    {
        $fields = [];

        switch ($sectionType) {

            case 'hero_section':
                $fields = [
                    ['name' => 'title', 'label' => 'Title', 'type' => 'text', 'required' => true],
                    ['name' => 'subtitle', 'label' => 'Subtitle', 'type' => 'text', 'required' => true],
                    ['name' => 'description', 'label' => 'Description', 'type' => 'textarea'],
                    ['name' => 'background_image', 'label' => 'Background Image URL', 'type' => 'text'],
                ];
                break;

            case 'social_section':
            case 'skills_section':
            case 'experience_section':
            case 'education_section':
                $fields = [
                    ['name' => 'title', 'label' => 'Section Title', 'type' => 'text', 'required' => true],
                    ['name' => 'description', 'label' => 'Description', 'type' => 'textarea'],
                ];
                break;

            case 'cta_section':
                $fields = [
                    ['name' => 'title', 'label' => 'Title', 'type' => 'text', 'required' => true],
                    ['name' => 'subtitle', 'label' => 'Subtitle', 'type' => 'text'],
                    ['name' => 'button_text', 'label' => 'Button Text', 'type' => 'text', 'required' => true],
                    ['name' => 'button_url', 'label' => 'Button URL', 'type' => 'text', 'required' => true],
                ];
                break;
        }

        return view('admin.about.partials.content-fields', compact('fields', 'sectionType'));
    }
}