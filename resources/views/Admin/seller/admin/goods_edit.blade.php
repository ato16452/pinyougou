<!DOCTYPE html>
<html>

<head>
    <!-- 页面meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>商品编辑</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" name="viewport">
	<meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="/seller/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/seller/plugins/adminLTE/css/AdminLTE.css">
    <link rel="stylesheet" href="/seller/plugins/adminLTE/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="/seller/css/style.css">
	<script src="/seller/plugins/jQuery/jquery-2.2.3.min.js"></script>
    <script src="/seller/plugins/bootstrap/js/bootstrap.min.js"></script>

    <!-- 富文本编辑器 -->
	<link rel="stylesheet" href="/seller/plugins/kindeditor/themes/default/default.css" />
	<script charset="utf-8" src="/seller/plugins/kindeditor/kindeditor-min.js"></script>
	<script charset="utf-8" src="/seller/plugins/kindeditor/lang/zh_CN.js"></script>
</head>

<body class="hold-transition skin-red sidebar-mini" >

            <!-- 正文区域 -->
            <section class="content">

                <div class="box-body">

                    <!--tab页-->
                    <div class="nav-tabs-custom">

                        <!--tab头-->
                        <ul class="nav nav-tabs">                       		
                            <li class="active">
                                <a href="#home" data-toggle="tab">商品基本信息</a>                                                        
                            </li>   
                            <li >
                                <a href="#pic_upload" data-toggle="tab">商品图片</a>                                                        
                            </li>    
                            <li >
                                <a href="#customAttribute" data-toggle="tab">扩展属性</a>                                                        
                            </li>     
                            <li >
                                <a href="#spec" data-toggle="tab" >规格</a>                                                        
                            </li>                       
                        </ul>
                        <!--tab头/-->
						
                        <!--tab内容-->
                        <div class="tab-content">

                            <!--表单内容-->
                            <div class="tab-pane active" id="home">
                                <div class="row data-type">                                  
								   <div class="col-md-2 title">商品分类</div>
		                          
		                           	  <div class="col-md-10 data">
		                           	  	<table>
		                           	  		<tr>
		                           	  			<td>
		                           	  				<select class="form-control" onchange="change2(this)" id="one" >
														<option value="">--请选择--</option>
														@foreach($data as $k=>$v)
														<option value="{{$v->id}}">{{$v->name}}</option>
														@endforeach
													</select>
		                              			</td>
		                              			<td>
		                           	  				<select class="form-control select-sm" onchange="change3(this)" id="two">
														<option>--请选择--</option>
													</select>
		                              			</td>
		                              			<td>
		                           	  				<select class="form-control select-sm"  id="three">
														<option>--请选择--</option>
													</select>
		                              			</td>

		                           	  		</tr>
		                           	  	</table>
		                              	
		                              </div>	                              
		                          	  
									
		                           <div class="col-md-2 title">商品名称</div>
		                           <div class="col-md-10 data">
		                               <input type="text" id="goods_name" name="goods_name" class="form-control"    placeholder="商品名称" value="">
		                           </div>
		                           
		                           <div class="col-md-2 title">品牌</div>
		                           <div class="col-md-10 data">
		                              <select class="form-control"  onchange="change4()" id="brand">
										  <option value="">--请选择--</option>
										  @foreach($brand as $k=>$v)
											  <option value="{{$v->id}}">{{$v->name}}</option>
										  @endforeach
									  </select>
		                           </div>
		
								   <div class="col-md-2 title">副标题</div>
		                           <div class="col-md-10 data">
		                               <input type="text" id="caption" name="caption" class="form-control"   placeholder="副标题" value="">
		                           </div>
		                           
		                           <div class="col-md-2 title">价格</div>
		                           <div class="col-md-10 data">
		                           	   <div class="input-group">
			                          	   <span class="input-group-addon">¥</span>
			                               <input type="text" class="form-control" id="price" name="price"  placeholder="价格" value="">
		                           	   </div>
		                           </div>
		                           
		                           <div class="col-md-2 title editer">商品介绍</div>
                                   <div class="col-md-10 data editer">
                                       <textarea name="content" id="introduction" style="width:800px;height:400px;visibility:hidden;" ></textarea>
                                   </div>
		                           
		                           <div class="col-md-2 title rowHeight2x">包装列表</div>
		                           <div class="col-md-10 data rowHeight2x">
		                               
		                           	<textarea rows="4" name="package_list" id="package_list" class="form-control"   placeholder="包装列表"></textarea>
		                           </div>
		                           
		                           <div class="col-md-2 title rowHeight2x">售后服务</div>
		                           <div class="col-md-10 data rowHeight2x">
		                               <textarea rows="4" name="sale_service" class="form-control" id="sale_service"   placeholder="售后服务"></textarea>
		                           </div>                        
                                  
                                    
                                </div>
                            </div>
                            
                            <!--图片上传-->
                            <div class="tab-pane" id="pic_upload">
                                <div class="row data-type">                                  
								 <!-- 颜色图片 -->
								 <div class="btn-group">
					                 <button type="button" class="btn btn-default" title="新建" data-target="#uploadModal"  data-toggle="modal"  ><i class="fa fa-file-o"></i> 新建</button>
                             		                 
					             </div>
								 
								 <table class="table table-bordered table-striped table-hover dataTable">
					                    <thead>
					                        <tr>
					                            
											    <th class="sorting">颜色</th>
											    <th class="sorting">图片</th>
												<th class="sorting">操作</th>
							            </thead>
					                    <tbody>
					                      <tr>					                           
									            <td>
									            	
									            </td>
									            <td>
									           		<img alt="" src="" width="100px" height="100px">	            	 
									            </td>
												 <td> <button type="button" class="btn btn-default" title="删除" ><i class="fa fa-trash-o"></i> 删除</button></td> 
					                      </tr>
					                    </tbody>
								 </table> 
								  
                                </div>
                            </div>
                           
                           
                            <!--扩展属性-->
                            <div class="tab-pane" id="customAttribute">
                                <div class="row data-type">                                
	                                <div>
		                                <div class="col-md-2 title">扩展属性1</div>
				                        <div class="col-md-10 data">
				                              <input class="form-control" placeholder="扩展属性1">	            	 
				                        </div>
	                                </div>       
									<div>
		                                <div class="col-md-2 title">扩展属性2</div>
				                        <div class="col-md-10 data">
				                              <input class="form-control" placeholder="扩展属性2">	            	 
				                        </div>
	                                </div>  									
                                </div>
                            </div>
                      
                            <!--规格-->
                            <div class="tab-pane" id="spec">
                            	<div class="row data-type">
	                            	<div class="col-md-2 title">是否启用规格</div>
			                        <div class="col-md-10 data">
			                        	<input type="checkbox" >			                           
			                        </div>
                            	</div>
                            	<p>
                            	
                            	<div>
                            	
	                                <div class="row data-type">
	                                
		                                <div>
			                                <div class="col-md-2 title">屏幕尺寸</div>
					                        <div class="col-md-10 data">
					                               
					                            <span>
					                            	<input  type="checkbox" >4.0					                            				                            	
					                            </span>  	
												<span>
					                            	<input  type="checkbox" >4.5					                            				                            	
					                            </span>
												<span>
					                            	<input  type="checkbox" >5.0					                            				                            	
					                            </span>												
					                            	
					                        </div>
		                                </div>   
										<div>
			                                <div class="col-md-2 title">网络制式</div>
					                        <div class="col-md-10 data">
					                               
					                            <span>
					                            	<input  type="checkbox" >2G					                            				                            	
					                            </span>  	
												<span>
					                            	<input  type="checkbox" >3G					                            				                            	
					                            </span>
												<span>
					                            	<input  type="checkbox" >4G					                            				                            	
					                            </span>												
					                            	
					                        </div>
		                                </div>  
		                                                                                  
	                                </div>
	
	                                
	                                <div class="row data-type">
	                                	 <table class="table table-bordered table-striped table-hover dataTable">
						                    <thead>
						                        <tr>					                          
												    <th class="sorting">屏幕尺寸</th>
													<th class="sorting">网络制式</th>
												    <th class="sorting">价格</th>
												    <th class="sorting">库存</th>
												    <th class="sorting">是否启用</th>
												    <th class="sorting">是否默认</th>
											    </tr>
								            </thead>
						                    <tbody>
						                      <tr>					                           
										            <td>
										            	4.0
										            </td>
													<td>
										            	3G
										            </td>
										            <td>
										           		<input class="form-control"  placeholder="价格">
										            </td>
										            <td>
										            	<input class="form-control" placeholder="库存数量">
										            </td>
										            <td>
										             	<input type="checkbox" >
										            </td>
										            <td>
										                <input type="checkbox" >									             	
										            </td>
						                      </tr>
											  <tr>					                           
										            <td>
										            	4.0
										            </td>
													<td>
										            	4G
										            </td>
										            <td>
										           		<input class="form-control"  placeholder="价格">
										            </td>
										            <td>
										            	<input class="form-control" placeholder="库存数量">
										            </td>
										            <td>
										             	<input type="checkbox" >
										            </td>
										            <td>
										                <input type="checkbox" >									             	
										            </td>
						                      </tr>
											  <tr>					                           
													<td>
										            	5.0
										            </td>
													<td>
										            	3G
										            </td>
										            <td>
										           		<input class="form-control"  placeholder="价格">
										            </td>
										            <td>
										            	<input class="form-control" placeholder="库存数量">
										            </td>
										            <td>
										             	<input type="checkbox" >
										            </td>
										            <td>
										                <input type="checkbox" >									             	
										            </td>
						                      </tr>
											  <tr>					                           
													<td>
										            	5.0
										            </td>
													<td>
										            	4G
										            </td>
										            <td>
										           		<input class="form-control"  placeholder="价格">
										            </td>
										            <td>
										            	<input class="form-control" placeholder="库存数量">
										            </td>
										            <td>
										             	<input type="checkbox" >
										            </td>
										            <td>
										                <input type="checkbox" >									             	
										            </td>
						                      </tr>
											  
						                    </tbody>
									 	</table>
								
	                                </div>
	                                
	                            </div>
                            </div>
                            
                        </div>
                        <!--tab内容/-->
						<!--表单内容/-->
							 
                    </div>
                 	
                 	
                 	
                 	
                   </div>
                  <div class="btn-toolbar list-toolbar">
				      <a href="javascript:;" id="baocun" class="btn btn-primary" ><i class="fa fa-save"></i>保存</a>
				      <button class="btn btn-default" >返回列表</button>
				  </div>
			
            </section>
            
            
<!-- 上传窗口 -->
<div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" >
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h3 id="myModalLabel">上传商品图片</h3>
		</div>
		<div class="modal-body">							
			
			<table class="table table-bordered table-striped">
		      	<tr>
		      		<td>颜色</td>
		      		<td><input  class="form-control" placeholder="颜色" >  </td>
		      	</tr>			    
		      	<tr>
		      		<td>商品图片</td>
		      		<td>
						<table>
							<tr>
								<td>
								<input type="file" id="file" />				                
					                <button class="btn btn-primary" type="button" >
				                   		上传
					                </button>	
					            </td>
								<td>
									<img  src="" width="200px" height="200px">
								</td>
							</tr>						
						</table>
		      		</td>
		      	</tr>		      	
			 </table>				
			
		</div>
		<div class="modal-footer">						
			<button class="btn btn-success"  data-dismiss="modal" aria-hidden="true">保存</button>
			<button class="btn btn-default" data-dismiss="modal" aria-hidden="true">关闭</button>
		</div>
	  </div>
	</div>
</div>

            
            <!-- 正文区域 /-->
<script type="text/javascript">

	var editor;
	KindEditor.ready(function(K) {
		editor = K.create('textarea[name="content"]', {
			allowFileManager : true
		});
	});

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var editor=KindEditor.create('#introduction');
    var html=editor.html();
	var goods_name = $('#goods_name').val();
	var caption = $('#caption').val();
	var price = $('#price').val();
	$('#baocun').click(function () {
		$.post('/goods/goods',{'goods_name':goods_name,'html':html,'caption':caption,'price':price},function (data) {

        })
    })

</script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
//当一级分类发生变化时
	function change2(obj) {
        $('#two option:gt(0)').remove();
        $('#three option:gt(0)').remove();
	    //获取选择的value值,即一级分类id
      id  =  $("#one").val();
        // alert(id);
		$.post('/seller/goods_edit/two',{'id':id},function (data) {
		    // console.log(data);
			var str = '';
			for(var i= 0;i < data.length;i++){
			    str += '<option value="'+data[i].id+'">';
                str += data[i].name;
                str += '</option>';
			}
			$('#two').append(str);
        });
    }
    //当二级分类发生变化时
    function change3() {
        $('#three option:gt(0)').remove();
	    //alert(1);
	    //获取change1方法里传递的 一级分类的id
        id  =  $("#two").val();
        $.post('/seller/goods_edit/three',{'id':id},function (data) {
            // console.log(data);

            var str2 = '';
            for(var i= 0;i < data.length;i++){
                str2 += '<option value="'+data[i].id+'">';
                str2 += data[i].name;
                str2 += '</option>';
            }
            $('#three').append(str2);
        });

    }
</script>
<script>

</script>

</body>
</html>