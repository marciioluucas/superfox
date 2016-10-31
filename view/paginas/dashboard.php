<?php
/**
 * Created by PhpStorm.
 * User: Marcio
 * Date: 19/10/2016
 * Time: 19:55
 * // */
require_once("../../controller/usuarioController.php");
$usuarioController = new UsuarioController();
?>


<span class="card-title">Dashboard</span>

<article>
    <section>
        <!--        --><?php //$usuarioController->infoUsuarioLogado('nome'); ?>

        <script>
            $(document).ready(function () {


                new Morris.Line({
                    // ID of the element in which to draw the chart.
                    element: 'grafico1',
                    // Chart data records -- each entry in this array corresponds to a point on
                    // the chart.

                    resize: true,
                    data: [
                        {year: '2008', value: 20},
                        {year: '2009', value: 10},
                        {year: '2010', value: 5},
                        {year: '2011', value: 5},
                        {year: '2012', value: 20}
                    ],
                    // The name of the data record attribute that contains x-values.
                    xkey: 'year',
                    // A list of names of data record attributes that contain y-values.
                    ykeys: ['value'],
                    // Labels for the ykeys -- will be displayed when you hover over the
                    // chart.
                    labels: ['Valor'],
                    lineColors: ['#e55d2d']
                });

                new Morris.Donut({
                    element: 'grafico2',
                    resize: true,
                    colors: ['#e28666','#e4764f', '#e55d2d'],
                    data: [
                        {label: "Teste 1", value: 12},
                        {label: "Teste 2", value: 30},
                        {label: "Teste 3", value: 20}
                    ]
                })
                ;
            });

        </script>
        <div class="row" style="">
            <div class="col s12 m6 l6">
                <div id="grafico1" class="col-lg-6" style="height: auto"></div>

            </div>
            <div class="col s12 m6 l6">
                <div id="grafico2" class="col-lg-6" style="height: auto;"></div>
            </div>
        </div>
    </section>
</article>
