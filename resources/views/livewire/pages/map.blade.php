<div class="hm-map-container fw-map">
    <div wire:ignore id='map'></div>

    @push('scripts')
        <script>
            document.addEventListener('livewire:load', () => {
                const defaultLocation = [4.8500226183,7.10380666404]
                mapboxgl.accessToken = '{{env("MAPBOXGL_KEY")}}';
                var map = new mapboxgl.Map({
                    container: 'map',
                    center: defaultLocation,
                    zoom: 11.15
                });


                const loadLocations = (geoJson) => {

                    geoJson.features.forEach((location) => {
                        const {geometry, properties} = location
                        const {locationId, title, image, description} = properties

                        let markerElement = document.createElement('div')
                        markerElement.className = 'marker' + locationId
                        markerElement.id = locationId
                        markerElement.style.backgroundImage = 'url(img/marker.png)'
                        markerElement.style.backgroundSize = 'cover'
                        markerElement.style.width = '30px'
                        markerElement.style.height = '0px'

                        const imageStorage = '{{ asset("storage/") }}' + '/' + image

                        const content = `
                        
                            <div style="overflow-y, auto;max-height:400px,width:100%">
                                <table>
                                    <tbody>
                                        <tr>

                                            <td>Title</td>
                                            <td>${title}</td>
                                        </tr>
                                        <tr>
                                            <td>Picture</td>
                                            <td><img src="${image}" loading="lazy" class="img-fluid"></td>
                                        </tr>
                                        <tr>
                                            <td>Description</td>
                                            <td>${description}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        
                        `

                        const popUp = new mapboxgl.Popup({
                            offset:25
                        }).setHTML(content).setMaxWidth("400px")

                        new mapboxgl.Marker(markerElement)
                        .setLngLat(geometry.coordinates)
                        .setPopup(popUp)
                        .addTo(map)
                    });
                };   

                loadLocations({!! $geoJson !!});

                const style = "streets-v11";

                map.setStyle(`mapbox://styles/mapbox/${style}`);

                map.addControl(new mapboxgl.NavigationControl());

                map.on('click', (e) => {
                    const longitude = e.lngLat.lng
                    const latitude = e.lngLat.lat

                    @this.long = longitude
                    @this.lat = latitude
                });
            });
        </script>
    @endpush
</div>