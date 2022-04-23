<section>
    <div class="container">
    
        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-10 text-center">
                <div class="sec-heading center mb-4">
                    <h2>Recent Listed Property</h2>
                    <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores</p>
                </div>
            </div>
        </div>
        
        <div class="row justify-content-center">
            @forelse ($properties as $property)
                <x-front.property :property="$property"/>
            @empty
                <p>No properties available</p>
            @endforelse
      
        </div>
        
        <!-- Pagination -->
        <x-front.explore>
            <x-slot name="link">
                <a href="list-layout-with-map.html" class="btn btn-theme-light-2 rounded">
                    Explore More Properties
                </a>
            </x-slot>
        </x-front.explore>
        
    </div>
</section>