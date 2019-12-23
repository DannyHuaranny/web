$(document).ready(function(){
    $('#datatables').DataTable({
        "destroy":true,
        responsive:true,
        "order": [[ 1, "asc" ]],
        "lengthMenu": [[10, 200, -1], [10, 200,  "All"]],
        //"dom": '<"top"Bfl<"clear">>rt<"bottom"ip<"clear">>',
        "dom":"<'row'<'col-sm-12 col-xs-12 text-center'B>>" +
                "<'row'<'col-sm-6'l><'col-sm-6'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'i><'col-sm-7'p>>",
        "buttons":[
            {
                "text":"Copiar",
                "titleAttr":"Copiar",
                "extend":"copy"
            },
            {
                "text":"Excel",
                "titleAttr":"Exportar Tabla a Excel",
                "extend":"excel"
            },
            {
                "text":"CSV",
                "titleAttr":"Exportar Tabla a CSV",
                "extend":"excel"
            },
            {
                "text":"exportar ",
                "titleAttr":"Exportar Tabla a PDF",
                "extend":"pdf"
            },
            {
                "text":"Imprimir",
                "titleAttr":"imprimir Tabla",
                "extend":"print"
            },
            {
                "text":"Columnas",
                "titleAttr":"Mostrar/Ocultar Columnar",
                "extend":"colvis"
            },
            
            
        ],
        stateSave: true,
        //dom: 'Bfrtip',
        /*buttons: [[
            'copy', 'excel', 'csv','pdf','print','colvis']
            ],*/
        fixedHeader: true,
        processing: true,
        "language":{"url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"},

         });
     })