<?php

session_start();

requireValidSession(); //Se n tiver user na sessão, redireciona pra login


loadTemplateView('data-livro-coment-user');
