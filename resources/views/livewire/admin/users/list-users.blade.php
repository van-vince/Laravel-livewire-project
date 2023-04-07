<div>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Users</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">Users</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <!-- Main Content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="d-flex justify-content-end mb-3">
                        <button wire:click.prevent='addNew' class="btn btn-primary">
                            <i class="fa fa-plus-circle"></i>
                            Add new user
                        </button>
                    </div>
                    <div class="card">
                        <div class="card-body table-responsive">
                            <table class="table table-striped table-hover ">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Username</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user )
                                    <tr>
                                        <th scope="row">{{$loop -> iteration}}</th>
                                        <td>{{$user -> name}}</td>
                                        <td>{{$user -> email}}</td>
                                        <td>
                                            <a href="" wire:click.prevent="edit({{$user}})"><i class="fa fa-edit mr-3"></i> </a>
                                            <a href="" wire:click.prevent="confirmUserRemoval({{ $user->id }})"><i class="fa fa-trash text-danger"></i> </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->

    <!-- Modal -->
    <div class="modal fade" id="form" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

            <form wire:submit.prevent='{{$showEditModel ? "updateUser" : "createUser" }}'>
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                        @if($showEditModel)
                        <span>Edit User</span>
                        @else
                        <span>Add new user</span>
                        @endif
                    </h1>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></button>
                </div>
                <div class="modal-body">            
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" wire:model.defer='state.name' placeholder="Enter username" class="form-control  @error('name') is-invalid @enderror" id="name" aria-describedby="nameHelp">
                            @error('name')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" wire:model.defer='state.email' placeholder="Enter email" class="form-control @error('name') is-invalid @enderror" id="email" aria-describedby="emailHelp">
                            @error('email')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" wire:model.defer='state.password' placeholder="Enter password" class="form-control @error('name') is-invalid @enderror" id="password">
                            @error('password')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="passwordConfirmation" class="form-label">Confirm Password</label>
                            <input type="password" wire:model.defer='state.password_confirmation' placeholder="Confirm password" class="form-control @error('name') is-invalid @enderror" id="passwordConfirmation">
                            @error('password')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">
                    @if($showEditModel)
                        <span>Save changes</span>
                        @else
                        <span>Save</span>
                        @endif
                    </button>
                </div>
            </form>

            </div>
        </div>
    </div>

    <!-- confirmation Modal -->
    <div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete user </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to delete this user?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" wire:click.prevent='deleteUser' class="btn btn-danger">Delete user</button>
      </div>
    </div>
  </div>
</div>
</div>