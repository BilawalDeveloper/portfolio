<?php

namespace App\Livewire;

use App\Models\Project;
use Livewire\Component;

class ProjectShowcase extends Component
{
    public function render()
    {
        $projects = Project::where('is_published', true)
            ->where('featured', true)
            ->orderBy('order')
            ->take(6)
            ->get();

        return view('livewire.project-showcase', [
            'projects' => $projects,
        ]);
    }
}
