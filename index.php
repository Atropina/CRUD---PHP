<!DOCTYPE html>
<html lang="pt-br">
<?php include('./views/modules/header.php'); ?>

<body>
  <?php include('./views/modules/navbar.php'); ?>
  <?php include('./controllers/getUser.php'); ?>

  <div class="container mt-5">
    <div class="card shadow mb-4 ">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Usuários</h6>
        <a class="btn btn-secondary" data-toggle="modal" data-target="#modalFilter"><i class="fa fa-search"></i> Procurar</a>
        <a class="btn btn-success" data-toggle="modal" data-target="#cadUser"><i class="fa fa-plus"></i> Novo usuario</a>

      </div>

      <div class="card-body">
        <div id="divUser">


          <table id='userTable' class="table table-striped table-dark">
            <thead class="thead-dark ">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Estado</th>
                <th scope="col">Cidade</th>
                <th scope="col">Ações</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($usuarios as $u => $chave) {
                echo '<tr>';
                echo  '<th>' . $chave['id_user'] . '</th>';
                echo  '<th>' . $chave['nome'] . '</th>';
                echo  '<th>' . $chave['estado'] . '</th>';
                echo  '<th>' . $chave['cidade'] . '</th>';

                echo '<th>' . '<a data-toggle="modal" data-target="#modalUpdate' . $chave['id_user'] . '" class="btn btn-primary" ><i class="fa fa-pencil"></i></a>';
                echo '<a class="btn btn-danger ml-2 mr-2" id="btn-deleta" onclick=deletar(' . $chave['id_user'] . ')><i class="fa fa-trash"></i></a>' . '</th>';
                echo '</tr>';
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <?php foreach ($usuarios as $u => $chave) { ?>
    <div class="modal fade bd-example-modal-lg" id="modalUpdate<?php echo $chave['id_user'] ?>" tabindex="-1" role="dialog" aria-labelledby="modalUpdate" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h5 class="modal-title"> Editar <?php echo $chave['nome'] ?>.</h5>

          </div>
          <div class="modal-body">

            <form action="" id="formUpdate<?php echo $chave['id_user'] ?>">
              <div class="form-row mb-2">
                <div class="col">
                  <label for="nome">Nome</label>
                  <input type="text" class="form-control" value="<?php echo $chave['nome']; ?>" name="nomeU">
                  <input type="text" hidden class="form-control" value="<?php echo $chave['id_user']; ?>" name="idU">
                </div>
              </div>
              <div class="form-row mb-2">
                <div class="col">
                  <label for="estado">Estado</label>
                  <select name="estadoU" id="estadoU" class="form-control">
                    <option value="<?php echo $chave['estado']; ?>" selected><?php echo $chave['estado']; ?></option>
                    <option value="AC">Acre</option>
                    <option value="AL">Alagoas</option>
                    <option value="AP">Amapá</option>
                    <option value="AM">Amazonas</option>
                    <option value="BA">Bahia</option>
                    <option value="CE">Ceará</option>
                    <option value="DF">Distrito Federal</option>
                    <option value="ES">Espírito Santo</option>
                    <option value="GO">Goiás</option>
                    <option value="MA">Maranhão</option>
                    <option value="MT">Mato Grosso</option>
                    <option value="MS">Mato Grosso do Sul</option>
                    <option value="MG">Minas Gerais</option>
                    <option value="PA">Pará</option>
                    <option value="PB">Paraíba</option>
                    <option value="PR">Paraná</option>
                    <option value="PE">Pernambuco</option>
                    <option value="PI">Piauí</option>
                    <option value="RJ">Rio de Janeiro</option>
                    <option value="RN">Rio Grande do Norte</option>
                    <option value="RS">Rio Grande do Sul</option>
                    <option value="RO">Rondônia</option>
                    <option value="RR">Roraima</option>
                    <option value="SC">Santa Catarina</option>
                    <option value="SP">São Paulo</option>
                    <option value="SE">Sergipe</option>
                    <option value="TO">Tocantins</option>
                  </select>

                </div>
                <div class="col">
                  <label for="estado">Cidade</label>
                  <input type="text" class="form-control" value="<?php echo $chave['cidade']; ?>" name="cidadeU">
                </div>
              </div>
            </form>



          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="button" onclick="update(<?php echo $chave['id_user'] ?>)" idUser="<?php echo $chave['id_user'] ?>" id="btn-update" class="btn btn-primary">Salvar</button>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>
  <div class="modal fade" id="cadUser" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Cadastrar usuário</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="" id="formUser">
            <div class="form-row mb-2">
              <div class="col">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" name="nome">
              </div>
            </div>
            <div class="form-row mb-2">
              <div class="col">
                <label for="estado">Estado</label>
                <select name="estado" id="estado" class="form-control">
                  <option value="" selected>Selecione o estado</option>
                  <option value="AC">Acre</option>
                  <option value="AL">Alagoas</option>
                  <option value="AP">Amapá</option>
                  <option value="AM">Amazonas</option>
                  <option value="BA">Bahia</option>
                  <option value="CE">Ceará</option>
                  <option value="DF">Distrito Federal</option>
                  <option value="ES">Espírito Santo</option>
                  <option value="GO">Goiás</option>
                  <option value="MA">Maranhão</option>
                  <option value="MT">Mato Grosso</option>
                  <option value="MS">Mato Grosso do Sul</option>
                  <option value="MG">Minas Gerais</option>
                  <option value="PA">Pará</option>
                  <option value="PB">Paraíba</option>
                  <option value="PR">Paraná</option>
                  <option value="PE">Pernambuco</option>
                  <option value="PI">Piauí</option>
                  <option value="RJ">Rio de Janeiro</option>
                  <option value="RN">Rio Grande do Norte</option>
                  <option value="RS">Rio Grande do Sul</option>
                  <option value="RO">Rondônia</option>
                  <option value="RR">Roraima</option>
                  <option value="SC">Santa Catarina</option>
                  <option value="SP">São Paulo</option>
                  <option value="SE">Sergipe</option>
                  <option value="TO">Tocantins</option>
                </select>

              </div>
              <div class="col">
                <label for="estado">Cidade</label>
                <input type="text" class="form-control" name="cidade">
              </div>
            </div>
          </form>
        </div>


        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="button" id="btn-cadastrar" class="btn btn-primary">Cadastrar</button>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade bd-example-modal-lg" id="modalFilter" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h5 class="modal-title">Buscar</h5>

        </div>

        <div class="modal-body">
          <form id="formPesquisa">
            <div class="form-row">
              <div class="col-md-4">
                <input type="text" name="nomeP" placeholder="Nome" class="form-control">
              </div>
              <div class="col-md-2">
                <select name="estadoP" class="form-control">
                  <option value="" selected>Selecione o estado</option>
                  <option value="AC">Acre</option>
                  <option value="AL">Alagoas</option>
                  <option value="AP">Amapá</option>
                  <option value="AM">Amazonas</option>
                  <option value="BA">Bahia</option>
                  <option value="CE">Ceará</option>
                  <option value="DF">Distrito Federal</option>
                  <option value="ES">Espírito Santo</option>
                  <option value="GO">Goiás</option>
                  <option value="MA">Maranhão</option>
                  <option value="MT">Mato Grosso</option>
                  <option value="MS">Mato Grosso do Sul</option>
                  <option value="MG">Minas Gerais</option>
                  <option value="PA">Pará</option>
                  <option value="PB">Paraíba</option>
                  <option value="PR">Paraná</option>
                  <option value="PE">Pernambuco</option>
                  <option value="PI">Piauí</option>
                  <option value="RJ">Rio de Janeiro</option>
                  <option value="RN">Rio Grande do Norte</option>
                  <option value="RS">Rio Grande do Sul</option>
                  <option value="RO">Rondônia</option>
                  <option value="RR">Roraima</option>
                  <option value="SC">Santa Catarina</option>
                  <option value="SP">São Paulo</option>
                  <option value="SE">Sergipe</option>
                  <option value="TO">Tocantins</option>
                </select>
              </div>
              <div class="col-md-4">
                <input type="text" name="cidadeP" placeholder="Cidade" class="form-control">
              </div>

          </form>
          <div class="col-md-2">
            <a class="btn btn-secondary" id="btn-buscar">Buscar</a>
          </div>
        </div>


        <div class='mt-4' id="divBusca" style="display: block;">
          <table id="tableBusca" class="table table-striped table-dark table-bored">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Estado</th>
                <th scope="col">Cidade</th>
              </tr>
            </thead>
            <tbody id="tabelaBody">

            </tbody>
          </table>
        </div>

      </div>
    </div>
  </div>










  <?php include('./views/modules/footer.php'); ?>

  <script>
    function update(id) {

      form = "#formUpdate" + id

      var dados = $(form).serialize();

      $.ajax({
        type: "POST",
        url: "http://localhost/Empresa/controllers/update.php",
        data: dados,
        dataType: "json",
        success: (data) => {
          if (data) {
            $('#modalUpdate' + id).modal('hide')
            Swal.fire({
                icon: 'success',
                title: 'Sucesso',
                text: 'Usuário alterado com sucesso',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Eba'
              }),

              $("#divUser").load(
                "http://localhost/Empresa #divUser"
              )
          } else {
            Swal.fire({
              icon: 'error',
              title: 'Erro',
              text: 'Erro ao tentar atualizar',
              confirmButtonColor: '#788073',
              confirmButtonText: 'ok'
            })
          }
        }
      })

    }



    function deletar(id) {
      Swal.fire({
        icon: 'warning',
        title: 'Exlcuir',
        text: 'Quer realmente deletar este usuário?',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sim, deletar.',
        cancelButtonText: 'Deixa pra la.'
      }).then((res) => {
        if (res.isConfirmed) {
          
          $("#divUser").html(
              "<div class='progress progress-info progress-striped active'><div class='bar' style='width: 100%'></div></div>"
            ),

            $.ajax({
              type: "POST",
              url: "http://localhost/Empresa/controllers/deletar.php",
              data: "id=" + id,
              dataType: "json",
              success: (data) => {
                if (data) {
                  Swal.fire({
                    icon: 'success',
                    title: 'Sucesso',
                    text: 'Usuário deletado com sucesso',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Eba'
                  })
                  $("#divUser").load(
                    "http://localhost/Empresa #divUser"
                  )
                } else {
                  Swal.fire({
                    icon: 'error',
                    title: 'Erro',
                    text: 'Erro ao tentar deletar',
                    confirmButtonColor: '#788073',
                    confirmButtonText: 'ok'
                  })
                  $("#divUser").load(
                    "http://localhost/Empresa #divUser"
                  )
                }

              }
            })
        }
      })
    }


    $(document).on("click", "#btn-buscar", () => {
      var dados = $('#formPesquisa').serialize();
      $("#divBusca").load(
          "http://localhost/Empresa #divBusca"
        ),
        setTimeout(() => {
          $.ajax({
            type: "POST",
            url: "http://localhost/Empresa/controllers/filter.php",
            data: dados,
            dataType: "json",
            success: (data) => {

              if (data) {
                for (var i = 0; data.length > i; i++) {
                  $("#tabelaBody").append('<tr><td>' + data[i].id_user + '</td><td>' + data[i].nome + '</td><td>' + data[i].estado + '</td><td>' + data[i].cidade + '</td></tr>')
                }
              } else {
                Swal.fire({
                  icon: 'error',
                  title: 'Opa',
                  text: 'Nada encontrado. verifique os campos e tente novamente.',
                  confirmButtonColor: '#3085d6',
                  confirmButtonText: 'ok'
                })
              }



            }
          })
        }, 100)
    })

    $(document).on("click", "#btn-cadastrar", function(event) {

      var dados = $('#formUser').serialize();
      console.log(dados)
      $("#divUser").html(
          "<div class='progress progress-info progress-striped active'><div class='bar' style='width: 100%'></div></div>"
        ),
        $.ajax({
          type: "POST",
          url: "http://localhost/Empresa/controllers/user.php",
          data: dados,
          dataType: "json",
          success: function(data) {
            if (data.result == true) {
              Swal.fire({
                icon: 'success',
                title: 'Sucesso',
                text: 'Usuário cadastrado com sucesso',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Eba'
              })
              $("#divUser").load(
                "http://localhost/Empresa #divUser"
              )

            } else {
              Swal.fire({
                icon: 'error',
                title: 'Erro',
                text: 'Erro ao tentar cadastrar',
                confirmButtonColor: '#788073',
                confirmButtonText: 'ok'
              })
            }
          }
        })
    })
  </script>
</body>

</html>