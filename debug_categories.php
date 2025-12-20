<?php

require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Category;
use App\Models\Project;

echo "=== فحص الفئات والمشاريع ===\n\n";

// فحص جميع الفئات
echo "1. جميع الفئات في قاعدة البيانات:\n";
$categories = Category::all();
foreach ($categories as $category) {
    echo "   - ID: {$category->id}, الاسم: {$category->name}, Slug: {$category->slug}\n";
}

echo "\n2. الفئات التي لديها مشاريع نشطة (حسب التحسين الجديد):\n";
$activeCategories = Category::whereHas('projects', function ($query) {
    $query->where('is_active', true);
})->get();
foreach ($activeCategories as $category) {
    echo "   - ID: {$category->id}, الاسم: {$category->name}\n";
}

echo "\n3. جميع المشاريع مع حالتها:\n";
$projects = Project::with('category')->get();
foreach ($projects as $project) {
    $status = $project->is_active ? 'نشط' : 'غير نشط';
    $categoryName = $project->category ? $project->category->name : 'بدون فئة';
    echo "   - ID: {$project->id}, العنوان: {$project->title}, الحالة: {$status}, الفئة: {$categoryName}\n";
}

echo "\n4. فحص المشروع الجديد (إذا وجد):\n";
$webDevProjects = Project::whereHas('category', function ($query) {
    $query->where('name', 'like', '%web%');
})->get();

if ($webDevProjects->count() > 0) {
    foreach ($webDevProjects as $project) {
        $status = $project->is_active ? 'نشط' : 'غير نشط';
        $categoryName = $project->category ? $project->category->name : 'بدون فئة';
        echo "   - مشروع: {$project->title}, الحالة: {$status}, الفئة: {$categoryName}\n";
    }
} else {
    echo "   - لم يتم العثور على مشاريع في فئات تحتوي على 'web'\n";
}

echo "\n5. فحص الفئات التي تحتوي على 'web':\n";
$webCategories = Category::where('name', 'like', '%web%')->get();
foreach ($webCategories as $category) {
    $projectsCount = $category->projects()->where('is_active', true)->count();
    echo "   - فئة: {$category->name}, عدد المشاريع النشطة: {$projectsCount}\n";
}

echo "\n=== انتهى الفحص ===\n";