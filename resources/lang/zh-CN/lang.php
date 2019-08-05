<?php

return [
    'dashboard' => '控制面板',
    '404' => '不能找到此页面.',
    'auth' => [
        'title' => '验证',
        'username' => '用户名',
        'password' => '密码',
        'login' => '登录',
        'logout' => '登出',
        'wrong-username' => '错误的用户名',
        'wrong-password' => '密码错误',
        'since' => '注册时间 :date',
    ],
    'model' => [
        'create' => '创建 :title',
        'edit' => '更新 :title',
    ],
    'links' => [
        'index_page' => '网站首页',
    ],
    'ckeditor' => [
        'upload' => [
            'success' => '文件上传成功: \\n- 大小: :size kb \\n- 宽度/高度: :width x :height',
            'error' => [
                'common' => '无法上传.',
                'wrong_extension' => '文件 ":file" 扩展名错误.',
                'filesize_limit' => '超过文件最大限制 :size kb.',
                'imagesize_max_limit' => '宽 x 高 = :width x :height \\n 超过最大宽高比: :maxwidth x :maxheight',
                'imagesize_min_limit' => '宽 x 高 = :width x :height \\n 最小宽高比: :minwidth x :minheight',
            ],
        ],
        'image_browser' => [
            'title' => '上传图片到服务器',
            'subtitle' => '选择图片',
        ],
    ],
    'table' => [
        'new-entry' => '新增',
        'edit' => '编辑',
        'restore' => '还原',
        'delete' => '删除',
        'delete-confirm' => '你真的想删除?',
        'delete-error' => '删除出错. 请先删除前置关联项目.',
        'moveUp' => '上移',
        'moveDown' => '下移',
        'error' => '噢~出现了一些错误.',
        'filter' => '筛选',
        'filter-goto' => '显示',
        'save' => '保存',
        'save_and_close' => '保存并关闭',
        'save_and_create' => '保存后新建其它项',
        'cancel' => '取消',
        'download' => '下载',
        'all' => '全选',
        'processing' => '<i class="fas fa-spinner fa-5x fa-spin"></i>',
        'loadingRecords' => '载入...',
        'lengthMenu' => '显示 _MENU_ 项目',
        'zeroRecords' => '没有找到相关内容.',
        'info' => '从 _START_ 到 _END_ of _TOTAL_ 项',
        'infoEmpty' => '显示 0 to 0 of 0 项',
        'infoFiltered' => '(共筛选出 _MAX_ 项)',
        'infoThousands' => ',',
        'infoPostFix' => '',
        'search' => '查找: ',
        'emptyTable' => '没有内容',
        'paginate' => [
            'first' => '首页',
            'previous' => '&larr;',
            'next' => '&rarr;',
            'last' => '尾页',
        ],
    ],
    'editable' => [
        'checkbox' => [
            'checked' => '是',
            'unchecked' => '否',
        ],
    ],
    'select' => [
        'nothing' => '没有选中',
        'selected' => '选中',
        'placeholder' => '从列表中选择',
    ],
    'image' => [
        'browse' => '选择图片',
        'browseMultiple' => '选择图片',
        'remove' => '移除图片',
        'removeMultiple' => '移除',
    ],
    'file' => [
        'browse' => '选择文件',
        'remove' => '移除文件',
    ],
    'message' => [
        'created' => '<i class="fas fa-check fa-lg"></i> 创建成功！',
        'updated' => '<i class="fas fa-check fa-lg"></i> 更新成功！',
        'deleted' => '<i class="fas fa-check fa-lg"></i> 成功删除！',
        'restored' => '<i class="fas fa-check fa-lg"></i> 已还原！',
    ],
];
