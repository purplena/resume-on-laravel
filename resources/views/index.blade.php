<x-layout>
    <div class="mt-navbarMargin">
        <x-sections.hero />
        <x-sections.about />
        <x-sections.projects :coordinates="$coordinates" :webProjects="$webProjects" />
        <x-sections.contact />
    </div>
</x-layout>
