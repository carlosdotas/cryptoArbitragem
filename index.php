<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Sistema de Arbitragem</title>
	<link rel="stylesheet" type="text/css" href="src/themes/default/easyui.css">
	<link rel="stylesheet" type="text/css" href="src/themes/icon.css">
	<link rel="stylesheet" type="text/css" href="../demo.css">
	<script type="text/javascript" src="src/jquery.min.js"></script>
	<script type="text/javascript" src="src/jquery.easyui.min.js"></script>
</head>



<body class="easyui-layout" >
        <div data-options="region:'north'" style="height:50px"></div>
        <div data-options="region:'south',split:true" style="height:50px;"></div>
        <div data-options="region:'east',split:true" title="East" style="width:100px;"></div>
        <div data-options="region:'west',split:true" title="West" style="width:100px;"></div>
        <div data-options="region:'center',title:'Arbitragens Posíveis',iconCls:'icon-ok'">
            <table class="easyui-datagrid"
                    data-options="
                    rownumbers:true,
                    url:'api.php',
                    method:'get',
                    border:false,
                    singleSelect:true,
                    fit:true
                    ">
                <thead>
                    <tr>
                        <th data-options="field:'conversao'" width="120">Mercado</th>

                        <th data-options="
                        field:'arbitragem',
                        align:'center',
	                    fitColumns:true,formatter: function(value,row,index){
							return row.exchage_compra+' > '+row.exchage_venda;
						}" >Arbitragem</th>
                        <th data-options="
                        field:'preco_compra',
                        align:'center',
	                    fitColumns:true,formatter: function(value,row,index){
							return '<a href=\''+row.url_comprar+'\' target=\'_blank\' >'+value+'</a>';
						}" >Preço de Compra</th>
						<th data-options="
                        field:'preco_venda',
                        align:'center',
	                    fitColumns:true,formatter: function(value,row,index){
							return '<a href=\''+row.url_vender+'\' target=\'_blank\' >'+value+'</a>';
						}" >Preço de Venda</th>

                        <th data-options="field:'diferenca',align:'center'" width="150">Deferença</th>
                        <th data-options="
                        field:'percentual',
                        align:'center',
	                    fitColumns:true,formatter: function(value,row,index){
							return row.percentual+'%';
						}" >Percentual</th>
                    </tr>
                </thead>
            </table>
        </div>


</body>
</html>