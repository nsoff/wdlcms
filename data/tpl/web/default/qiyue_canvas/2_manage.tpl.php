<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<script type="text/javascript">
    function fooe_delete(id){
        $.getJSON(window.location.href, {'delid':id}, function(json){
            if(json.message.state==0){
                location.reload();
            }
        });
    }
    function fooe_save(id){
        $.getJSON(window.location.href, {'saveid':id}, function(json){
            if(json.message.state==0){
                location.reload();
            }
        });
    }
</script>
<div class="main">
    <ul class="nav nav-tabs" role="tablist">
        <li<?php  if($ischeck=='0') { ?> class="active"<?php  } ?>>
            <a href="<?php  echo $this->createWebUrl('check')?>">未审核</a>
        </li>
        <li<?php  if($ischeck=='1') { ?> class="active"<?php  } ?>>
            <a href="<?php  echo $this->createWebUrl('list')?>">已审核</a>
        </li>
    </ul>
    <div class="row">
<?php  if(is_array($result['list'])) { foreach($result['list'] as $item) { ?>
      <div class="col-sm-4 col-md-3" data-id="<?php  echo $item['id'];?>">
        <div class="thumbnail">
            <div style="padding: 5px;">
                #<?php  echo $item['id'];?>
                <div class="pull-right">
                    <a href="javascript:;" onclick="QIYUE.delete(this)"><i class="glyphicon glyphicon-trash"></i> 删除</a>
                <?php  if($item['ischeck']==0) { ?>
                    <a href="javascript:;" onclick="QIYUE.check(this)"></i> 审核</a>
                <?php  } ?>
                </div>
            </div>
            <img src="<?php  echo tomedia($item['attach'])?>" width="100%" alt="">
            <div class="caption">
                <p><span class="pull-right"><?php  echo date('Y-m-d H:i:s',$item['createtime'])?></span></p>
            </div>
        </div>
      </div>
<?php  } } ?>
    </div>
<?php  echo $result['pager'];?>
<script type="text/javascript">
    var QIYUE = {
        delete: function(_this){
            var $this = $(_this).parent().parent().parent().parent();
            var id = $this.attr('data-id');
            if(!id) return false;
            $.post(window.location.href, {"op":"delete","id":id}, function(msg){
                var _obj = JSON.parse(msg);
                if(_obj.message.state==0){
                    $this.remove();
                }
            });
        },
        check: function(_this){
            var $this = $(_this).parent().parent().parent().parent();
            var id = $this.attr('data-id');
            if(!id) return false;
            $.post(window.location.href, {"op":"check","id":id}, function(msg){
                var _obj = JSON.parse(msg);
                if(_obj.message.state==0){
                    $this.remove();
                }
            });
        }
    }
</script>
</div>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>