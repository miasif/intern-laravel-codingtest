<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    {{ __("Dear Candidate, You're logged in!") }}
                </div>
                <div class="p-6">
                    {!! $aboutusContent !!}
                    <script>
                        function removeElements() {
                            var elementsToRemove = ['webase-nav', 'page-title-area', 'footer-section'];
                            
                            elementsToRemove.forEach(function(className) {
                                var elements = document.getElementsByClassName(className);
                                for (var i = elements.length - 1; i >= 0; i--) {
                                    elements[i].remove();
                                }
                            });
                        }
                        removeElements();
                    </script>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
