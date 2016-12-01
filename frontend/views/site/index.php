<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\bootstrap\Modal;
use yii\helpers\Url;
$this->title = 'ExamenNTP';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Bienvenido!</h1>

        <p class="lead">Esta registrese para comprar una bebida.</p>
<?=
                                Html::button('Seleccionar Bebida', [
                                    'class' => 'btn btn-success btn-ajax-modal',
                                    'value' => Url::to(['/pedido/create',]),
                                    'data-target' => '#modal_pedido',
                                ]);
                                ?>
    </div>
    <?php
    //*** SEE MODAL CODE IS NOW BELOW GRIDVIEW CODE
    Modal::begin([
        'id' => 'modal_pedido',
        'header' => '<h4>Pedido</h4>',
    ]);

    echo '<div id="modal-content"></div>';
    Modal::end();
    ?>
    <!--div class="panel panel-success">
        <div class="panel-heading">Seleccione su bebida.</div>
        <div class="panel-body">

            <p><a class="btn btn-lg btn-success" >Cafe: $0.5</a></p>
            <p><a class="btn btn-lg btn-success" >Te: $0.4</a></p>
            <p><a class="btn btn-lg btn-success" >Agua: $0.25</a></p>
        </div>
    </div-->
</div>
<?php
$this->registerJs('
        $(\'.btn-ajax-modal\').click(function (){
        
    var elm = $(this),
        target = elm.attr(\'data-target\'),
        ajax_body = elm.attr(\'value\');

    $(target).modal(\'show\')
        .find(\'.modal-content\')
        .load(ajax_body);
});
    ');
?>
