<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Cargar Pdf
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                  <form class="" action="{{route('carga.save')}}" method="post" enctype="multipart/form-data">
                    @csrf

                    <input type="file" name="urlpdf[]" value="" multiple accept="application/pdf">
                    <input type="submit" value="Subir" class="btn btn-danger">
                  </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
$('input[type="file"]').on('change', function(){
var ext = $( this ).val().split('.').pop();
if ($( this ).val() != '') {
  if(ext != "pdf"){
    $( this ).val('');
    alert("Extensión no permitida: " + ext);
  }

}
});
</script>
