<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            API Rick and Morty
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                  <div id="result_api" class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3"></div>
                  <br>
                
                  <nav aria-label="Page navigation example">
                      <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="#" id="prev">Anterior</a></li>
                      
                        <li class="page-item"><a class="page-link" href="#" id="next">Siguiente</a></li>
                      </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>

    function data(done){

        var results = fetch("{{$pg}}");

        results
            .then(response => response.json())
            .then(data => {
                done(data)
            });
    }

    data(data => {
        
      
            urlNext = data.info.next;
            $('#next').attr('href', '?pg='+urlNext);
       
            urlPrev = data.info.prev;
            $('#prev').attr('href', '?pg='+urlPrev);
      
        

        console.log(data);
        data.results.forEach(personaje => {

            const article = document.createRange().createContextualFragment(`
                <div class="col">
                    <div class="card" style="width:18rem;"> 
                        <img src="${personaje.image}" class="card-img-top" alt="Personaje">  
                        <div class="card-body">    
                            <h5 class="card-title">Nombre : ${personaje.name}</h5>    
                            <p class="card-text">Estatus : ${personaje.status}</p>  
                        </div>
                    </div>
                </div>`);
            


            const main = document.querySelector("#result_api");

            main.append(article);
            //console.log(${personaje.name});

        });
        
    });
    
</script>


