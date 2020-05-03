<?php

function loadModel($modelName)
{ //carrega o model de forma mais descomplicada
    require_once(MODEL_PATH . "/{$modelName}.php");
}
// Eventualmente, quando eu precisar passar dados pra view, utilizarei o $params. Ex: exibir lista de users do BD pra que sejam renderizadas e depois exibidas ns view
function loadView($viewName, $params = array())
{

    if (count($params) > 0) {
        foreach ($params as $key => $value) {
            if (strlen($key) > 0) {
                ${$key} = $value;
            }
        }
    }
    require_once(VIEW_PATH . "/{$viewName}.php");
}


function loadTemplateView ($viewName, $params = array()) {

    if(count($params) > 0) {
        foreach($params as $key => $value) {
            if(strlen($key) > 0) {
                ${$key} = $value;
            }
        }
    }

    require_once(TEMPLATE_PATH ."/header.php");
    require_once(TEMPLATE_PATH ."/left.php");
    require_once(TEMPLATE_PATH ."/footer.php");
    require_once(VIEW_PATH ."/{$viewName}.php");


}

// function renderTitle($title, $subtitle, $icon = null) {
//     require_once(TEMPLATE_PATH . "/title.php");
// } //criar função
