<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    /**
     * 后台首页
     * @Author wzb 2016-10-18
     **/
    public function index() {
        /*后台菜单配置*/
        $menu = array(
            array('url'=>'admin/index','class'=>'am-icon-home','name'=>'首页'),
            array('class'=>'am-icon-user-md','name'=>'用户','children'=>array(
                'admin/user/index'=>array('class'=>'am-icon-users','name'=>'用户管理'),
            )
            ),
            array('class'=>'am-icon-money','name'=>'账户','children'=>array(
                'admin/getmoney/index'=>array('class'=>'am-icon-rmb','name'=>'提现管理'),
                'admin/flow/index'=>array('class'=>'am-icon-rmb','name'=>'现金流水'),
                'admin/flowgold/index'=>array('class'=>'am-icon-usd','name'=>'金币流水'),
            )
            ),
            array('class'=>'am-icon-comment','name'=>'信息','children'=>array(
                'admin/thread/index'=>array('class'=>'am-icon-comments','name'=>'信息管理'),
                'admin/thread/appointment'=>array('class'=>'am-icon-comments','name'=>'预约信息'),
                'admin/cate/index'=>array('class'=>'am-icon-twitch','name'=>'分类管理'),
            )
            ),
            array('class'=>'am-icon-shopping-cart','name'=>'商城','children'=>array(
                'admin/goods/index'=>array('class'=>'am-icon-comments','name'=>'商品管理'),
                'admin/order/index'=>array('class'=>'am-icon-twitch','name'=>'订单管理'),
                'admin/keywords/index'=>array('class'=>'am-icon-wordpress','name'=>'关键词管理'),
            )
            ),
            array('class'=>'am-icon-cogs','name'=>'系统','children'=>array(
                'admin/siteconfig/index'=>array('class'=>'am-icon-gear','name'=>'网站配置'),
                'admin/adminuser/index'=>array('class'=>'am-icon-gear','name'=>'管理员管理'),
                'admin/admingroup/index'=>array('class'=>'am-icon-gear','name'=>'管理员组管理'),
                'admin/aclsource/index'=>array('class'=>'am-icon-gear','name'=>'资源管理'),
                'admin/plugins/index'=>array('class'=>'am-icon-plug','name'=>'插件管理'),
            )
            ),
            array('class'=>'am-icon-pie-chart','name'=>'统计','children'=>array(
                'admin/cnt/index'=>array('class'=>'am-icon-area-chart','name'=>'综合统计'),
                'admin/cnt/thread'=>array('class'=>'am-icon-bar-chart','name'=>'信息活跃度统计'),

            )
            ),
        );
        $data = array(
            'menu'=>$menu,
            'title'=>'后台首页'
        );
        return view('admin/index',$data);
    }
}
