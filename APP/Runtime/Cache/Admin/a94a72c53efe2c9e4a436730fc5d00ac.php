<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!-- 销售后台录入：不是销售网点和销售员报来的销售单由后台人员录入（所以不用录入销售网点和销售员），下面的型号就是要先检索产品的数据表然后让销售员逐步进行确定型号。其他那些是否必填，就用星号标记必须填。 -->
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="__PUBLIC__/Css/public.css" />
	<link rel="stylesheet" href="__PUBLIC__/Css/fontawesome/css/font-awesome.min.css">
	<title>销售单录入</title>
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
       <form  action="<?php echo U('add');?>"  method="post"> 
		    <table class='table'>
			<tr>
      <th align='right'>顾客姓名</th>
      <td width='70%'><input type="text" value="<?php echo ($salesClientName); ?>" name="salesClientName"></td>
      </tr>
      <tr>
      <th align='right'>顾客手机号码</th>
      <td width='70%'><input type="text" value="<?php echo ($salesClientPhone); ?>" name="salesClientPhone"></td>
      </tr>
      <tr>
      <th align='right'>顾客固话（可空）</th>
      <td width='70%'><input type="text" value="<?php echo ($salesPersonTelePhone); ?>" name="salesPersonTelePhone"></td>
      </tr>
      <tr>
      <th align='right'>发票号（可空）</th>
      <td width='70%'><input type="text" value="<?php echo ($salesInvoiceID); ?>" name="salesInvoiceID"></td>
      </tr>
      <tr>
      <th align='right'>邮箱（可空）</th>
      <td width='70%'><input type="text" value="<?php echo ($salesClientMail); ?>" name="salesClientMail"></td>
      </tr>
      <tr>
      <th align='right'>购买时间</th>
      <td width='70%'><input type="text" value="<?php echo ($salesBuyTime); ?>" name="salesBuyTime" class="date_picker"/></td>
      </tr>
      <tr>
      <th align='right'>预约安装时间</th>
      <td width='70%'><input type="text" value="<?php echo ($salesInstallTime); ?>" name="salesInstallTime" class="date_picker"/></td>
      </tr>
      <tr>
      <th align='right'>安装地址</th>
      <td width='70%'><input type="text" value="<?php echo ($salesPersonAddress); ?>" name="salesPersonAddress"></td>
      </tr>
            <tr><th align='right'>是否使用支架</th><td width='60%'>
                <select name="salesStand">
                <?php if($salesStand == 1): ?><option value="1" selected="selected">是</option>
                  <option value="0">否</option>
                <?php else: ?>
                  <option value="1">是</option>
                  <option value="0" selected="selected">否</option><?php endif; ?>
                </select>
           </td></tr>
           <tr><th align='right'>是否返现:</th><td width='60%'>
                <select name="salesCashback">
                <?php if($salesCashback == 1): ?><option value="1" selected="selected">是</option>
                  <option value="0">否</option>
                <?php else: ?>
                  <option value="1">是</option>
                  <option value="0" selected="selected">否</option><?php endif; ?>
                </select>
           </td></tr>
      <tr>
      <th align='right'>购买数量</th>
      <td width='70%'><input type="text" value="<?php echo ($salesProductNum); ?>" name="salesProductNum"></td>
      </tr>
      <tr>
      <th align='right'>销售备注（可空）</th>
      <td width='70%'><input type="text" value="<?php echo ($salesRemark); ?>" name="salesRemark"></td>
      </tr>
            <tr>
      <th align='right'>购买产品型号</th>
      <td width='70%'>
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
        </SELECT><input style="margin:5px 10%;cursor:pointer;" type="submit" value="+其他型号">
      </td>
      </tr>
      
    </table>
    <input style="margin:10px 30%;cursor:pointer;" type="submit" value="录入">
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