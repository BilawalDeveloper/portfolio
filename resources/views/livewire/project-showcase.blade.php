<div>
    @if($projects->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($projects as $project)
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 hover:scale-105">
                    @if($project->image)
                        <div class="aspect-video bg-gradient-to-br from-blue-500 to-purple-600 relative overflow-hidden">
                            <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" class="w-full h-full object-cover">
                        </div>
                    @else
                        <div class="aspect-video bg-gradient-to-br from-blue-500 to-purple-600 flex items-center justify-center">
                            <svg class="w-24 h-24 text-white opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                    @endif
                    <div class="p-6">
                        <h3 class="text-2xl font-bold mb-2">{{ $project->title }}</h3>
                        <p class="text-gray-600 dark:text-gray-400 mb-4">{{ $project->description }}</p>
                        
                        @if($project->technologies)
                            <div class="flex flex-wrap gap-2 mb-4">
                                @foreach($project->technologies as $tech)
                                    <span class="px-3 py-1 bg-blue-100 dark:bg-blue-900/30 text-blue-700 dark:text-blue-300 rounded-full text-sm">
                                        {{ $tech }}
                                    </span>
                                @endforeach
                            </div>
                        @endif

                        <div class="flex gap-4">
                            @if($project->github_url)
                                <a href="{{ $project->github_url }}" target="_blank" class="text-blue-600 dark:text-blue-400 hover:underline">
                                    View Code
                                </a>
                            @endif
                            @if($project->demo_url)
                                <a href="{{ $project->demo_url }}" target="_blank" class="text-purple-600 dark:text-purple-400 hover:underline">
                                    Live Demo
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="text-center py-12">
            <div class="w-24 h-24 mx-auto mb-6 bg-gray-200 dark:bg-gray-800 rounded-full flex items-center justify-center">
                <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
            </div>
            <h3 class="text-2xl font-bold text-gray-800 dark:text-gray-200 mb-2">No Projects Yet</h3>
            <p class="text-gray-600 dark:text-gray-400">Check back soon for exciting AI projects!</p>
        </div>
    @endif
</div>
