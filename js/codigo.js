$(function(){
    $(".reg_producto .btn_mostrar").click(function(e){
        let codprod = $(this).closest(".reg_producto").children(".codprod").text();

        location.href ="mostrar_producto.php?codprod=" + codprod;
    });
        
    $(".reg_producto .btn_editar").click(function (e) {
    let codprod = $(this).closest(".reg_producto").children(".codprod").text();

    location.href = "editar_producto.php?codprod=" + codprod;
    });
    
    $(".reg_producto .btn_borrar").click(function (e) {
        
        let codprod = $(this).closest(".reg_producto").children(".codprod").text();
        let prod = $(this).closest(".reg_producto").children(".prod").text();

        $("#md_borrar .lbl_codprod").text(codprod);
        $("#md_borrar .lbl_prod").text(prod);

        $("#md_borrar .btn_borrar").attr("href", "../controlador/ctr_borrar_prod.php?codprod=" + codprod);

        $("#md_borrar").modal("show");
    });
    $(document).ready(function () {
        $("#frm_consultar_prod #txt_codprod").focusout(function (e) {
           
            e.preventDefault();
            // Capturar el valor ingresado en el cuadro de texto
            let codprod = $(this).val();

            if (codprod != "") {
                // Implementar la consulta por medio de AJAX para JQuery 
                $.ajax({
                    url: "../controlador/ctr_consultar_prod.php",
                    type: "POST",
                    data: { codprod: codprod },
                    success: function (rpta) {
                        let rp = JSON.parse(rpta);

                        if (rp) {
                            $(".prod").html(rp.producto);
                            $(".stk").html(rp.stock_disponible);
                            $(".cst").html("S/. " + rp.costo);
                            $(".gnc").html(rp.ganancia);
                            $(".prc").html("S/. " + rp.precio);
                            $(".mar").html(rp.producto_codigo_marca);   
                            $(".cat").html(rp.producto_codigo_categoria);
                        } else {
                            
                            //alert("El código " + codprod + " no existe");

                            $('#md_consulta_error .modal-header').addClass('bg-gradient')
                            $("#md_consulta_error .modal-body").html('<p>El codigo <b>' + codprod + '</b> no existe</p>');
                            $("#md_consulta_error").modal('show');

                            $("#txt_codprod").val("");

                            let vacio = "&nbsp;";

                            $(".prod").html(vacio);
                            $(".stk").html(vacio);
                            $(".cst").html(vacio);
                            $(".gnc").html(vacio);
                            $(".prc").html(vacio);
                            $(".mar").html(vacio);
                            $(".cat").html(vacio);

                            $("#txt_codprod").focus();
                        }
                    }
                });
            }

        });
    });

    $(document).ready(function () {
        $("#form_filtrar_prod").submit(function (e) {
            e.preventDefault();

            var valor = $("#txt_valor").val();

            if (valor != "") {
                $.post("../controlador/ctr_filtrar_prod.php",
                    { valor: valor },
                    function (rpta) {
                        $('#md_aviso .modal-header').removeClass('bg-danger');
                        $('#md_aviso .modal-header').addClass('bg-primary');

                        $('#md_aviso .modal-dialog').removeClass('modal-md');
                        $('#md_aviso .modal-dialog').addClass('modal-xl');

                        $('#md_aviso .modal-title').html('');
                        $('#md_aviso .modal-title').html('Productos Filtrados');

                        $('#md_aviso .modal-body').html("<div id='tabla'></div>")

                        $("#tabla").html(rpta);

                        $('#md_aviso').modal('show');
                    });
            } else {

                $('#md_aviso .modal-header').removeClass('bg-primary');
                $('#md_aviso .modal-header').addClass('bg-danger');

                $('#md_aviso .modal-dialog').removeClass('modal-xl');
                $('#md_aviso .modal-dialog').addClass('modal-md');

                $('#md_aviso .modal-title').html('');
                $('#md_aviso .modal-title').html('Advertencia');

                $("#tabla").html("");
                
                $('#md_aviso .modal-body').html("<p>No haz ingresado un dato para buscar...</p>")

                $('#md_aviso').modal('show');
                $("#txt_valor").focus();
            }
        });
    });

    
});
    