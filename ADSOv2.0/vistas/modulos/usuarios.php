<div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="btn-group">
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#ventanaIngresarUsuarios">
                        Ingresar Usuarios
                    </button>
                </div>


                <div class="container mt-3">
                    <h2>Panel administrativo usuarios</h2>           
                    <table id="tablaUsuarios" class="table table-dark table-hover">
                      <thead>
                        <tr>
                          <th>Nombres</th>
                          <th>Apellidos</th>
                          <th>Direccion</th>
                          <th>Documento</th>
                          <th>Email</th>
                          <th>Telefono</th>
                          <th>Sexo</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>John</td>
                          <td>Doe</td>
                          <td>john@example.com</td>
                          <td>john@example.com</td>
                          <td>john@example.com</td>
                          <td>john@example.com</td>
                          <td>john@example.com</td>
                          <td></td>
                        </tr>
                      </tbody>
                    </table>
                </div>


                <!-- modal de registro-->
                <div class="modal" id="ventanaIngresarUsuarios">
                    <div class="modal-dialog">
                      <div class="modal-content">
                  
                        <!-- Modal Header -->
                        <div class="modal-header">
                          <h4 class="modal-title">Registrar Usuarios</h4>
                          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                  
                        <!-- Modal body -->
                        <div class="modal-body">
                          <form id="formRegistroUsuario" action="" method="post" class="needs-validated" novalidate>
                              <div class="mb-3 mt-3">
                                <label for="txt_nombre" class="form-label">Nombre:</label>
                                <input type="text" class="form-control" id="txt_nombre" placeholder="Ingresa tu nombre" name="txt_nombre" required>
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                              </div>

                              <div class="mb-3 mt-3">
                                <label for="txt_apellido" class="form-label">Apellido:</label>
                                <input type="text" class="form-control" id="txt_apellido" placeholder="Ingresa tu apellido" name="txt_apellido" required>
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                              </div>

                              <div class="mb-3 mt-3">
                                <label for="txt_direccion" class="form-label">Dirección:</label>
                                <input type="text" class="form-control" id="txt_direccion" placeholder="Ingresa tu dirección" name="txt_direccion" required>
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                              </div>

                              <div class="mb-3 mt-3">
                                <label for="txt_documento" class="form-label">Documento:</label>
                                <input type="text" class="form-control" id="txt_documento" placeholder="Ingresa tu documento" name="txt_documento" required>
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                              </div>

                              <div class="mb-3 mt-3">
                                <label for="txt_email" class="form-label">Email:</label>
                                <input type="email" class="form-control" id="txt_email" placeholder="Ingresa tu email" name="txt_email" required>
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                              </div>

                              <div class="mb-3 mt-3">
                                <label for="txt_telefono" class="form-label">Telefono:</label>
                                <input type="number" class="form-control" id="txt_telefono" placeholder="Ingresa tu telefono" name="txt_telefono" required>
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                              </div>

                              <div class="mb-3 mt-3">
                                <label for="txt_sexo" class="form-label">Sexo:</label>
                                <select class="form-select" id="txt_sexo" required>
                                  <option selected disabled value="">Ingresa tu sexo</option>
                                  <option>Hombre</option>
                                  <option>Mujer</option>
                                </select>
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                              </div>

                              <button type="submit" class="btn btn-danger">Registrar Usuario</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                        
                  <!-- modal de edicion-->
                  <div class="modal" id="ventanaEditarUsuarios">
                    <div class="modal-dialog">
                      <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                          <h4 class="modal-title">Editar Usuarios</h4>
                          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                          
                          <form id="formEditarUsuario" action="" method="post" class="needs-validated" novalidate>
                              <div class="mb-3 mt-3">
                                <label for="txt_editnombre" class="form-label">Nombre:</label>
                                <input type="text" class="form-control" id="txt_editnombre" placeholder="Ingresa tu nombre" name="txt_nombre" required>
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                              </div>

                              <div class="mb-3 mt-3">
                                <label for="txt_editapellido" class="form-label">Apellido:</label>
                                <input type="text" class="form-control" id="txt_editapellido" placeholder="Ingresa tu apellido" name="txt_apellido" required>
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                              </div>

                              <div class="mb-3 mt-3">
                                <label for="txt_editdireccion" class="form-label">Dirección:</label>
                                <input type="text" class="form-control" id="txt_editdireccion" placeholder="Ingresa tu dirección" name="txt_direccion" required>
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                              </div>

                              <div class="mb-3 mt-3">
                                <label for="txt_editdocumento" class="form-label">Documento:</label>
                                <input type="text" class="form-control" id="txt_editdocumento" placeholder="Ingresa tu documento" name="txt_documento" required>
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                              </div>

                              <div class="mb-3 mt-3">
                                <label for="txt_editemail" class="form-label">Email:</label>
                                <input type="email" class="form-control" id="txt_editemail" placeholder="Ingresa tu email" name="txt_email" required>
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                              </div>

                              <div class="mb-3 mt-3">
                                <label for="txt_edittelefono" class="form-label">Telefono:</label>
                                <input type="number" class="form-control" id="txt_edittelefono" placeholder="Ingresa tu telefono" name="txt_telefono" required>
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                              </div>

                              <div class="mb-3 mt-3">
                                <label for="txt_editsexo" class="form-label">Sexo:</label>
                                <select class="form-select" id="txt_editsexo" required>
                                  <option selected disabled value="">Ingresa tu sexo</option>
                                  <option>Hombre</option>
                                  <option>Mujer</option>
                                </select>
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                              </div>

                              <button id="btnEditarRegistro" usuario="" type="submit" class="btn btn-danger">Editar Usuario</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
          </div>
</div>
