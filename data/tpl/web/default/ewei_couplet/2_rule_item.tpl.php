<?php defined('IN_IA') or exit('Access Denied');?>   <tr class='rule_item'>
                                    <td><input  name="rule_p1[]" type="text" class="form-control span3" value="<?php  echo $rule['p1'];?>"  maxlength="50"/></td>
                                    <td><input  name="rule_p2[]" type="text" class="form-control span3" value="<?php  echo $rule['p2'];?>"  maxlength="50"/></td>
                                    <td><input  name="rule_p3[]" type="text" class="form-control span3" value="<?php  echo $rule['p3'];?>"  maxlength="50"/></td>
                                    <td><input  name="rule_p4[]" type="text" class="form-control span3" value="<?php  echo $rule['p4'];?>"  maxlength="50"/></td>
                                    <td><input  name="rule_p5[]" type="text" class="form-control span3" value="<?php  echo $rule['p5'];?>"  maxlength="50"/></td>
                                    <td><input  name="rule_p6[]" type="text" class="form-control span3" value="<?php  echo $rule['p6'];?>"  maxlength="50"/></td>
                                    <td><input  name="rule_p7[]" type="text" class="form-control span3" value="<?php  echo $rule['p7'];?>"  maxlength="50"/></td>
                                    <td><input  name="rule_id[]" type="hidden" value="<?php  echo $rule['id'];?>" />
                                        <a class="btn btn-default" href='javascript:;' onclick='removeRule(this)'><i class='icon icon-remove fa fa-times'></i> 删除</a>
                                    </td>
                                </tr>