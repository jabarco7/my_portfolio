
<div class="flex justify-center gap-4 {{ $class ?? '' }}">
    @foreach (config('portfolio.social_links') as $social)
        <a href="{{ $social['url'] }}" 
           class="social-icon group flex items-center justify-center w-12 h-12 rounded-full bg-base-200 border border-base-300 hover:bg-primary hover:border-primary transition-all duration-300 hover:scale-110" 
           target="_blank" 
           rel="noopener noreferrer"
           title="{{ $social['label'] }}">
            <i class="{{ $social['icon'] }} transition-all duration-300 {{ $social['color'] ?? 'text-base-content' }}"></i>
        </a>
    @endforeach
</div>
