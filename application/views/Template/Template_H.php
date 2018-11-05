<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Ing. Jose A. Ramirez Mendoza">
    <!--bootstrap-->
    <link rel="stylesheet" href="<?php echo base_url();?>static/biblioteca/bootstrap/css/bootstrap.css">
    <script src="<?php echo base_url();?>static/biblioteca/bootstrap/js/bootstrap.js"></script>
    <script src="<?php echo base_url(); ?>static/js/popper.min.js"></script>
    <!--JQUERY-->
    <script src="<?php echo base_url(); ?>static/js/jquery-3.1.1.js"></script>
    <!--template-->
    <link rel="stylesheet" href="<?php echo base_url();?>static/css/template.css">

    <title><?php echo $titulo; ?></title>
  </head>
  <body>
    <header>
      <nav class="navbar navbar-expand-md navbar-dark fixed-top border-bottom box-shadow">
        <a class="navbar-brand text-dark" href="#">NOTARIA</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link text-dark" href="#">PRICIPAL <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-dark" href="/Welcome/segunda_pagina">segunda paguina</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-dark" href="/Welcome/subir_archivo">SUBIR ARCHIVO</a>
            </li>
          </ul>
          <form class="form-inline mt-2 mt-md-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Juan Sanchez" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">BUSCAR</button>
            <a class="nav-link text-dark" href="/login/loguot">CERRAR</a>
          </form>
        </div>
      </nav>
    </header>
