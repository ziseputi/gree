<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!-- 销售查询：这个没有什么要注意的，怎么做都行。 -->
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="__PUBLIC__/Css/public.css" />
	<link rel="stylesheet" href="__PUBLIC__/Css/fontawesome/css/font-awesome.min.css">
	<title>销售单查询</title>
    <script type="text/javascript" src="__PUBLIC__/Js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="__PUBLIC__/Js/jquery.date_input.pack.js"></script> 
    <script type="text/javascript">
		  function rec(){
		    var mymessage=confirm("你确定删除吗？");
		    if(mymessage==true)
		    {
		    	return true;
		    }
		    else
		    {
		        return false;
		    }
		  }    
  	</script>

    <script type="text/javascript">
  $(function(){
		$('.date_picker').date_input();
		})
  </script>
  <script type="text/javascript" src="__PUBLIC__/Js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="__PUBLIC__/Js/jquery.date_input.pack.js"></script> 
    <script type="text/javascript">
  $(function(){
		$('.date_picker').date_input();
		})
  </script>
  	 <script type="text/javascript">
	  /*  
	 **    ==================================================================================================  
	 **    类名：CLASS_LIANDONG_YAO  
	 **    功能：多级连动菜单  
	 **    
	 **    作者：YAODAYIZI  
	 **    ============================
	 	======================================================================  
	 **/   
	   function CLASS_LIANDONG_YAO(array)
	   {
	    //数组，联动的数据源
	    this.array=array; 
	    this.indexName='';
	    this.obj='';
	    //设置子SELECT
	  // 参数：当前onchange的SELECT ID，要设置的SELECT ID
	       this.subSelectChange=function(selectName1,selectName2)
	    {
	    //try
	    //{
	     var obj1=document.all[selectName1];
	     var obj2=document.all[selectName2];
	     var objName=this.toString();
	     var me=this;
	   
	     obj1.onchange=function()
	     {
	      
	      me.optionChange(this.options[this.selectedIndex].value,obj2.id)
	     }
	    }
	    //设置第一个SELECT
	  // 参数：indexName指选中项,selectName指select的ID
	    this.firstSelectChange=function(indexName,selectName)  
	    {
	    this.obj=document.all[selectName];
	    this.indexName=indexName;
	    this.optionChange(this.indexName,this.obj.id)
	    }
	   
	   // indexName指选中项,selectName指select的ID
	    this.optionChange=function (indexName,selectName)
	    {
	     var obj1=document.all[selectName];
	     var me=this;
	     obj1.length=0;
	     obj1.options[0]=new Option("请选择",'');
	     for(var i=0;i<this.array.length;i++)
	     { 
	     
	      if(this.array[i][1]==indexName)
	      {
	      //alert(this.array[i][1]+" "+indexName);
	       obj1.options[obj1.length]=new Option(this.array[i][2],this.array[i][0]);
	      }
	     }
	    }
	    
	   }

 </script>
</head>
<body>
  <form action="<?php echo U(add);?>" method="post" name="query">
  <table class='table'>
       <tr><th align='right'>销售单号</th><td width='90%'><input type="text" name="salesID" value="<?php echo ($salesID); ?>" ></td></tr>
       <tr><th align='right'>销售网点</th><td width='90%'><input type="text" value="<?php echo ($salesBranchID); ?>" name="salesBranchID"></td></tr>
       <tr><th align='right'>销售员手机号</th><td width='90%'><input type="text" value="<?php echo ($salesPersonID); ?>" name="salesPersonID"></td></tr>
       <tr><th align='right'>顾客姓名</th><td width='90%'><input type="text" value="<?php echo ($salesClientName); ?>" name="salesClientName"></td></tr>
       <tr><th align='right'>顾客手机号码</th><td width='90%'><input type="text" value="<?php echo ($salesClientPhone); ?>" name="salesClientPhone"></td></tr>
       <tr><th align='right'>发票号</th><td width='90%'><input type="text" value="<?php echo ($salesInvoiceID); ?>" name="salesInvoiceID"></td></tr>

       <tr><th align='right'>购买时间</th><td width='90%'><input type="text" value="<?php echo ($salesBuyTimeBegin); ?>" name="salesBuyTimeBegin" value="<?php echo ($salesBuyTimeBegin); ?>" class="date_picker"/>---<input type='text' value="<?php echo ($salesBuyTimeEnd); ?>" name='salesBuyTimeEnd' value="<?php echo ($salesBuyTimeEnd); ?>" class="date_picker"/></td></tr>

       <tr><th align='right'>预约安装时间</th><td width='90%'><input type="text" value="<?php echo ($salesInstallTimeBegin); ?>" name="salesInstallTimeBegin" value="<?php echo ($salesInstallTimeBegin); ?>" class="date_picker"/>---<input type='text' value="<?php echo ($salesInstallTimeEnd); ?>" name='salesInstallTimeEnd' value="<?php echo ($salesInstallTimeEnd); ?>" class="date_picker"/></td></tr>

			<tr>
			<th align='right'>购买产品型号</th>
			<td width='90%'>
				<SELECT ID="x1" NAME="x1"  >
					<OPTION selected></OPTION>
				</SELECT>
				<SELECT ID="x2" NAME="x2"  >
					<OPTION selected></OPTION>
				</SELECT>
				<SELECT ID="x3" NAME="x3"  >
					<OPTION selected></OPTION>
				</SELECT>
				<SELECT ID="x4" NAME="x4"  >
					<OPTION selected></OPTION>
				</SELECT>
			</td>
			</tr>
			<tr><th align='right'>是否使用支架</th><td width='90%'>
                <select name="salesStand">
                	<option value='' selected="selected">请选择</option>
                <?php if($salesStand == 1): ?><option value="1" selected="selected">是</option>
                <?php else: ?>
                  <option value="1">是</option><?php endif; ?>

                <?php if($salesStand == 0 && is_numeric($salesCashback)): ?><option value="0" selected="selected">否</option>
                <?php else: ?>
                  <option value="0">否</option><?php endif; ?>
                </select>
           </td></tr>
           <tr><th align='right'>是否返现:</th><td width='90%'>
                <select name="salesCashback">
                	<option value='' selected="selected">请选择</option>
                <?php if($salesCashback == 1): ?><option value="1" selected="selected">是</option>
                <?php else: ?>
                  <option value="1">是</option><?php endif; ?>

                <?php if($salesCashback == 0 && is_numeric($salesCashback)): ?><option value="0" selected="selected">否</option>
                <?php else: ?>
                  <option value="0">否</option><?php endif; ?>
                </select>
           </td></tr>
	</table> 	            
		   <!-- <input type="submit" value="查询"><P>单击查询默认查询全部</P> -->
		  <input type='submit' style="cursor:pointer"  value='查询' onclick="query.action='<?php echo U(add);?>';query.submit();"/>
	      <input type='submit' style="cursor:pointer"  value='导出' onclick="query.action='<?php echo U(expUser);?>';query.submit();"/><p>没输入内容，默认查询或者导出全部内容！</p>
	</form>
<form action="<?php echo U('add');?>" method="post">
		<table class='table'>
	<!-- 		<tr> 
			 <td class="sum" colspan='100%'> <a href="<?php echo U('SalesInquiries/expUser');?>" ><i class="icon-share-alt"></i> 导出</a></td>
			</tr> -->
			<tr>
				<th>销售单号</th>
				<th>销售网点</th>
				<th>销售员手机号</th>
				<th>销售员</th>
				<th>顾客姓名</th>
				<th>顾客手机号码</th>
				<th>顾客固定电话</th>
				<th>发票号</th>
				<th>邮箱</th>
				<th>购买时间</th>
				<th>预约安装时间</th>
				<th>安装地址</th>
				<th>购买产品型号</th>
				<th>销售提成</th>
				<th>是否要支架</th>
				<th>是否返现</th>
				<th>购买数量</th>
				<th>销售备注</th>
				<th>操作</th>
			</tr>

		    <?php if(is_array($array)): foreach($array as $key=>$vo): ?><tr>
		            <td> <?php echo ($vo["salesID"]); ?></td>
		            <td> <?php echo ($vo["branchName"]); ?></td>
		            <td> <?php echo ($vo["salesPersonID"]); ?></td>
		            <td> <?php echo ($vo["userName"]); ?></td>
		            <td> <?php echo ($vo["salesClientName"]); ?></td>
		            <td> <?php echo ($vo["salesClientPhone"]); ?></td>
		            <td> <?php echo ($vo["salesPersonTelePhone"]); ?> </td>
		            <td> <?php echo ($vo["salesInvoiceID"]); ?></td>
		            <td> <?php echo ($vo["salesClientMail"]); ?></td>
		            <td> <?php echo ($vo["salesBuyTime"]); ?></td>
		            <td> <?php echo ($vo["salesInstallTime"]); ?></td>
		            <td> <?php echo ($vo["salesPersonAddress"]); ?></td>
		            <td> <?php echo ($vo["salesModelID"]["0"]["name"]); ?>-<?php echo ($vo["salesModelID"]["1"]["name"]); ?>-<?php echo ($vo["salesModelID"]["2"]["name"]); ?>-<?php echo ($vo["salesModelID"]["3"]["name"]); ?></td>
		            <td> <?php echo ($vo["salesCommission"]); ?></td>
		            <td> <?php echo ($vo["salesStand"]); ?></td>
		            <td> <?php echo ($vo["salesCashback"]); ?></td>
		            <td> <?php echo ($vo["salesProductNum"]); ?></td>
		            <td> <?php echo ($vo["salesRemark"]); ?></td>
		            <td> 
		            <a href="<?php echo U('SalesInquiries/update',array('salesID' => $vo['salesID']));?>" >修改</a>
                    <a href="<?php echo U('SalesInquiries/delete',array('salesID' => $vo['salesID']));?>" onClick="return rec()">删除</a>
		            </td>
			   </tr><?php endforeach; endif; ?>
		</table>
		<div class="result page"><?php echo ($page); ?></div>
	</form>
</body>
<script type="text/javascript">
 //数据源 
  var arr=<?php echo ($arr); ?>;
 
  var array2=new Array();//数据格式 ID，父级ID，名称
  
  for(var o in arr){  
		array2[o]=new Array(arr[o].id,arr[o].pid,arr[o].name); 
    } 
  //--------------------------------------------
  //这是调用代码
  //设置数据源
  var liandong2=new CLASS_LIANDONG_YAO(array2);
  //设置第一个选择框
  liandong2.firstSelectChange("0","x1");
  //设置子选择框
  liandong2.subSelectChange("x1","x2")
  liandong2.subSelectChange("x2","x3")
  liandong2.subSelectChange("x3","x4")
  liandong2.subSelectChange("x4","x5")
 </script>
</html>