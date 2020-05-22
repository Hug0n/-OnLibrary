<?php

session_start();
loadModel('Post');
requireValidSession(); //Se n tiver user na sessão, redireciona pra login

loadTemplateView('Livro');
