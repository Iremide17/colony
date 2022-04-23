<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/moment.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="/js/ion.rangeSlider.min.js"></script>
<script src="{{ asset('css/plugins/select2/js/select2.full.min.js') }}"></script>
<script src="/js/jquery.magnific-popup.min.js"></script>
<script src="{{ asset('js/slick.js') }}"></script>
<script src="/js/lightbox.js"></script>
<script src="/js/imagesloaded.js"></script>
<script src="/js/daterangepicker.js"></script>
<script src="{{ asset('/js/custom.js') }}"></script>
<script src="{{ asset('js/nouislider.min.js') }}"></script>
<script src="{{ asset('js/toastr.min.js') }}"></script>
<script src="{{ asset('js/notiflix.js') }}"></script>
<script src='https://api.mapbox.com/mapbox-gl-js/v2.8.0/mapbox-gl.js'></script>

<script>
    $(document).ready(function() {
        toastr.options = {
            "positionClass": "toast-top-right",
            "progressBar": true
        }


        window.addEventListener('success', event => {
            toastr.success(event.detail.message, 'Success!');
        });

        window.addEventListener('error', event => {
            toastr.error(event.detail.message, 'Failed!');
        });

        window.addEventListener('info', event => {
            toastr.info(event.detail.message, 'Info!');
        });
    })
</script>

<script>
    @if(Session::has('messege'))
      var type="{{Session::get('alert-type','success')}}"
      switch(type){
          case 'info':
          Notiflix.Report.Info(
                "{{ Session::get('title') }}",
                "{{ Session::get('messege') }}", 
                "{{ Session::get('button') }}",
              );
               break;
          case 'success':
            Notiflix.Report.Success(
                "{{ Session::get('title') }}",
                "{{ Session::get('messege') }}", 
                "{{ Session::get('button') }}", 
            );
              break;
          case 'warning':
            Notiflix.Report.Warning(
                "{{ Session::get('title') }}", 
                "{{ Session::get('messege') }}", 
                "{{ Session::get('button') }}",
            );
              break;
          case 'error':
            Notiflix.Report.Failure(
              "{{ Session::get('title') }}",
              "{{ Session::get('messege') }}",
              "{{ Session::get('button') }}",
            );
              break;
      }
    @endif
</script>

<script>
    $('[x-ref="SettingLink"]').on('click', function() {
        localStorage.setItem('_x_currentTab', '"home"');
    });
</script>

<script type="text/javascript">
    // document.addEventListener('livewire:load', () => {

        window.addEventListener('review-form', event => {
            $('#review_modal').modal('show');
        });

        window.addEventListener('skill-form', event => {
            $('#skill').modal('show');
        });

        window.addEventListener('hide-review-form', event => {
            $('#review_modal').modal('hide');
            toastr.success(event.detail.message, 'Success!');
        });

        window.addEventListener('hide-review-error-form', event => {
            $('#review_modal').modal('hide');
            toastr.error(event.detail.message, 'Error!');
        })

        window.addEventListener('searchP', event => {
            $('#search-properties').modal('show');
        });
    // }
</script>

@stack('scripts')
@bukScripts(true)