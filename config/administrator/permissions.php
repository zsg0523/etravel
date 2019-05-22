<?php

/**
 * @Author: Eden
 * @Date:   2019-01-09 17:54:17
 * @Last Modified by:   Eden
 * @Last Modified time: 2019-05-22 10:52:13
 */
use Spatie\Permission\Models\Permission;

return [
    'title'   => '權限',
    'single'  => '權限',
    'model'   => Permission::class,

    'permission' => function () {
        return Auth::user()->can('manage_users');
    },

    // 对 CRUD 动作的单独權限控制，通过返回布尔值来控制權限。
    'action_permissions' => [
        // 控制『新建按钮』的显示
        'create' => function ($model) {
            return true;
        },
        // 允许更新
        'update' => function ($model) {
            return true;
        },
        // 不允许删除
        'delete' => function ($model) {
            return false;
        },
        // 允许查看
        'view' => function ($model) {
            return true;
        },
    ],

    'columns' => [
        'id' => [
            'title' => 'ID',
        ],
        'name' => [
            'title'    => '標識',
        ],
        'operation' => [
            'title'    => '管理',
            'sortable' => false,
        ],
    ],

    'edit_fields' => [
        'name' => [
            'title' => '標識（請慎重修改）',

            // 表单条目标题旁的『提示信息』
            'hint' => '修改權限標識會影響代碼調用，請不要輕易更改'
        ],
        'roles' => [
            'type' => 'relationship',
            'title' => '角色',
            'name_field' => 'name',
        ],
    ],

    'filters' => [
        'name' => [
            'title' => '標識',
        ],
    ],
];