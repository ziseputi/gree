<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!-- 销售网点新增（类似销售单做）。 -->
<html>
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="__PUBLIC__/Css/public.css" />
  <link rel="stylesheet" href="__PUBLIC__/Css/fontawesome/css/font-awesome.min.css">
	<title>销售网点新增</title>
</head>
<body>
       <form  action="<?php echo U('add');?>"  method="post">
       <table class='table'>
			<tr>
				<th>网点类型</th>
				<th>网点名</th>
				<th>网点地址</th>
				<th>网点负责人</th>
				<th>网点负责人电话</th>
			</tr>
			<tr>
				<td style="text-align:center;">
					<select name="branchtype">
						<option value="1">销售网点</option>
						<option value="2">安装网点</option>
					</select>
				</td>
				<td style="text-align:center;"><input  type="text" name="branchName"></td>
				<td style="text-align:center;"><input type="text" name="branchAddress"/></td>
				<td style="text-align:center;"><input type="text" name="branchPicName"/></td>
				<td style="text-align:center;"><input type="text" name="branchPicPhone"/></td>
			</tr>
		</table>
		    <input type="submit" value="新增"> 
       </form>
</body>
</html>