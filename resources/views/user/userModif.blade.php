@extends('user.layouts.master')

@section('contenue')

<main class="userModif">
    <form action="" method="POST" enctype="multipart/form-data" class="userModif-contenair">
        <div class="userModif-contenair-bg"></div>

        <figure class="userModif-contenair-figure">
            <img src="{{asset('images/11.jpg')}}" alt="" class="userModif-contenair-figure-img">
            <label for="pdp" class="userModif-contenair-figure-label">
                <i class="fa-solid fa-circle-plus userModif-contenair-figure-icon"></i>

                <input type="file" name="pdp" class="userModif-contenair-figure-file">
            </label>
        </figure>


        <div class="userModif-contenair-champs">
            <div class="userModif-contenair-champs-content">
                <label for="" class="userModif-contenair-champs-content-label">Pseudo</label><br>
                <input type="text" name="m-pseudo" value="" class="userModif-contenair-champs-content-input">

            </div>
            <div class="userModif-contenair-champs-content">
                <label for="">Email</label><br>
                <input type="text" name="m-email" value="" class="userModif-contenair-champs-content-input">

            </div>
            <div class="userModif-contenair-champs-content">
                <label for="">Mot de Pass</label><br>
                <input type="text" name="m-mdp" value="" class="userModif-contenair-champs-content-input">

            </div>
            <div class="userModif-contenair-champs-content">
                <label for="">Confirmer votre mot de pass</label><br>
                <input type="text" name="m-mdpConfirm" value="" class="userModif-contenair-champs-content-input">

            </div>
        </div>


        <button type="submit" class="userModif-contenair-btn">Confirmer</button>
    </form>
</main>

@endsection
