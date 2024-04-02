<?php
// Inclure le modèle
include "Models\ModifyMarqueModel.php";

class ModifyMarqueController {
    public function get_marque($id) {
        $model = new ModifyMarqueModel();
        $r = $model->get_marque($id);
        return $r;
    }
}
?>
