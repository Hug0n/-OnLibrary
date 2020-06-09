<?php

session_start();

requireValidSession(); //Se n tiver user na sessão, redireciona pra login


loadTemplateView('data-info-user-post-curtir');
