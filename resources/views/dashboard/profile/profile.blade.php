<x-panel-layout>
    <x-slot name="title">
        | Profile
    </x-slot>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="header-icon"><i class="fa fa-user-circle-o"></i></div>
            <div class="header-title">
                <h1>Profile</h1>
                <small>Show user data in clear profile design</small>
            </div>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-sm-12 col-md-4">
                    <div class="card" style="width:100%">
                        <div class="profile__info border cursor-pointer text-center">
                            <div class="avatar__img"><img src="img/pro.jpg" class="avatar___img">
                                <input type="file" accept="image/*" class="hidden avatar-img__input">
                                <div class="v-dialog__container" style="display: block;"></div>
                                <div class="box__camera default__avatar"></div>
                            </div>
                            <div class="card-body">
                            <h4 class="card-title">John Doe</h4>
                            <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
                            <a href="#" class="btn btn-primary">See Profile</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
    </div>
</x-panel-layout>
