<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Cadastro de clientes</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.7.0.slim.js" integrity="sha256-7GO+jepT9gJe9LB4XFf8snVOjX3iYNb0FHYr5LI1N5c=" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/0.9.0/jquery.mask.min.js"></script>
        
    </head>
    <body>
        <main>
            <div class="container-md">
                <form>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="inputCpf" class="form-label">Cpf</label>
                                <input type="text" class="form-control" id="inputCpf">
                            </div>
                            <div class="mb-3">
                                <label for="inputName" class="form-label">Nome</label>
                                <input type="text" class="form-control" id="inputName">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="inputBirthdate">Aniversário</label>
                                <input type="date" class="form-control" id="inputBirthdate">
                                
                            </div>
                            <div class="mb-3 form-check">
                                <label class="form-label" for="inputGender">Sexo:</label>
                                <div id="inputGender">
                                    <label class="form-check-label" for="checkGenderMale">Masculino</label>
                                    <input type="checkbox" class="form-check-input" id="checkGenderMale">
                                    <label class="form-check-label" for="checkGenderFemale">Feminino</label>
                                    <input type="checkbox" class="form-check-input" id="checkGenderFemale">
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">          
                                <label for="inputAddress" class="form-label">Endereço</label>
                                <input type="text" class="form-control" id="inputAddress">
                            </div>
                            <div class="mb-3">
                                <label for="inputState" class="form-label">Estado</label>
                                <select name="inputState" class="form-select" id="inputState">
                                    <option> Selecione o estado </option>
                                </select>
                            </div>
                            
                            <div class="mb-3">
                                <label for="inputCity" class="form-label">Cidade</label>
                                <select name="inputState"  class="form-select" id="inputState">
                                    <option> Selecione a cidade </option>
                                </select>
                            </div>
                        </div>
                    </div>                   
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <hr>
            <div class="container-md">
                <table id="ClientsTable">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Cpf</th>
                            <th>Nome</th>
                            <th>Aniversário</th>
                            <th>Sexo</th>
                            <th>Endereço</th>
                            <th>UF</th>
                            <th>Cidade</th>
                        </tr>
                    </thead>
                    <tbody id="TbodyClientsTable">
                        @foreach ($clientsArray['clients'] as $client)
                            <tr> 
                                <th><button> </button> <button> </button> </th>
                                <th>{{ $client->cpf }}</th> 
                                <th>{{ $client->name }}</th> 
                                <th>{{ $client->birthdate }}</th> 
                                <th>{{ $client->gender }}</th> 
                                <th>{{ $client->address }}</th> 
                                <th>{{ $client->state }}</th> 
                                <th>{{ $client->city }}</th> 
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </main>
        <script>
            $( document ).ready(function() {
                $('#inputCpf').mask('999.999.999-99');
                var data = loadTableAjax();
            });
            let table = new DataTable('#ClientsTable', {
                // config options...
            })
            async function loadTableAjax(){
                return await axios.get('http://localhost:80/api/client');
            }
        </script>
    </body>
</html>