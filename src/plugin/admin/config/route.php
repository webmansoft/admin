<?php

use Webman\Route;

Route::group('/core', function () {

    Route::get('/captcha', [plugin\admin\app\controller\LoginController::class, 'captcha']);
    Route::post('/login', [plugin\admin\app\controller\LoginController::class, 'login']);

    Route::get("/system/dictData",[plugin\admin\app\controller\SystemController::class, 'dictData']);
    Route::get('/system/user', [plugin\admin\app\controller\SystemController::class, 'userInfo']);
	Route::get('/system/clearAllCache', [plugin\admin\app\controller\SystemController::class, 'clearAllCache']);

    Route::get("/system/getResourceList",[plugin\admin\app\controller\SystemController::class, 'getResourceList']);
    Route::post("/system/saveNetworkImage",[plugin\admin\app\controller\SystemController::class, 'saveNetworkImage']);
    Route::post("/system/uploadImage",[plugin\admin\app\controller\SystemController::class, 'uploadImage']);
    Route::post("/system/uploadFile",[plugin\admin\app\controller\SystemController::class, 'uploadFile']);
    Route::get("/system/downloadById/{id}",[plugin\admin\app\controller\WhiteController::class, 'downloadById']);
    Route::get("/system/downloadByHash/{hash}",[plugin\admin\app\controller\WhiteController::class, 'downloadByHash']);
    Route::get("/system/getFileInfoById/{id}",[plugin\admin\app\controller\SystemController::class, 'getFileInfoById']);
    Route::get("/system/getFileInfoByHash/{hash}",[plugin\admin\app\controller\SystemController::class, 'getFileInfoByHash']);
    Route::get("/system/getUserList",[plugin\admin\app\controller\SystemController::class, 'getUserList']);
    Route::post("/system/getUserInfoByIds",[plugin\admin\app\controller\SystemController::class, 'getUserInfoByIds']);
    Route::get("/system/getLoginLogList",[plugin\admin\app\controller\SystemController::class, 'getLoginLogList']);
    Route::get("/system/getOperationLogList",[plugin\admin\app\controller\SystemController::class, 'getOperationLogList']);
    Route::get("/system/monitor",[plugin\admin\app\controller\SystemController::class, 'getServerInfo']);
    Route::get("/system/getPlugin",[plugin\admin\app\controller\SystemController::class, 'getPlugin']);

    Route::get("/logs/getLoginLogPageList",[\plugin\admin\app\controller\system\SystemLogController::class, 'getLoginLogPageList']);
    Route::delete("/logs/deleteLoginLog",[\plugin\admin\app\controller\system\SystemLogController::class, 'deleteLoginLog']);
    Route::get("/logs/getOperLogPageList",[\plugin\admin\app\controller\system\SystemLogController::class, 'getOperLogPageList']);
    Route::delete("/logs/deleteOperLog",[\plugin\admin\app\controller\system\SystemLogController::class, 'deleteOperLog']);

    fastRoute('notice',\plugin\admin\app\controller\system\SystemNoticeController::class);
    fastRoute('post',\plugin\admin\app\controller\system\SystemPostController::class);
    Route::post("/post/downloadTemplate",[plugin\admin\app\controller\system\SystemPostController::class, 'downloadTemplate']);

    fastRoute('menu',\plugin\admin\app\controller\system\SystemMenuController::class);
    fastRoute('dictType',\plugin\admin\app\controller\system\SystemDictTypeController::class);
    fastRoute('dictData',\plugin\admin\app\controller\system\SystemDictDataController::class);
    fastRoute('attachment',\plugin\admin\app\controller\system\SystemUploadfileController::class);

    fastRoute('role',\plugin\admin\app\controller\system\SystemRoleController::class);
    Route::get("/role/getMenuByRole/{id}",[\plugin\admin\app\controller\system\SystemRoleController::class,'getMenuByRole']);
    Route::get("/role/getDeptByRole/{id}",[\plugin\admin\app\controller\system\SystemRoleController::class,'getDeptByRole']);
    Route::post("/role/menuPermission/{id}",[\plugin\admin\app\controller\system\SystemRoleController::class,'menuPermission']);
    Route::post("/role/dataPermission/{id}",[\plugin\admin\app\controller\system\SystemRoleController::class,'dataPermission']);

    fastRoute("dept", \plugin\admin\app\controller\system\SystemDeptController::class);
    Route::get("/dept/leaders",[\plugin\admin\app\controller\system\SystemDeptController::class, 'leaders']);
    Route::post("/dept/addLeader",[\plugin\admin\app\controller\system\SystemDeptController::class, 'addLeader']);
    Route::delete("/dept/delLeader",[\plugin\admin\app\controller\system\SystemDeptController::class, 'delLeader']);

    fastRoute("user", \plugin\admin\app\controller\system\SystemUserController::class);
    Route::post("/user/updateInfo",[\plugin\admin\app\controller\system\SystemUserController::class, 'updateInfo']);
    Route::post("/user/modifyPassword",[\plugin\admin\app\controller\system\SystemUserController::class, 'modifyPassword']);
    Route::post("/user/clearCache",[\plugin\admin\app\controller\system\SystemUserController::class, 'clearCache']);
    Route::post("/user/initUserPassword",[\plugin\admin\app\controller\system\SystemUserController::class, 'initUserPassword']);
    Route::post("/user/setHomePage",[\plugin\admin\app\controller\system\SystemUserController::class, 'setHomePage']);

    fastRoute('configGroup',\plugin\admin\app\controller\system\SystemConfigGroupController::class);
    fastRoute('config',\plugin\admin\app\controller\system\SystemConfigController::class);
    Route::post("/config/updateByKeys",[\plugin\admin\app\controller\system\SystemConfigController::class, 'updateByKeys']);

    fastRoute('crontab',\plugin\admin\app\controller\system\SystemCrontabController::class);
    Route::post("/crontab/run",[\plugin\admin\app\controller\system\SystemCrontabController::class, 'run']);
    Route::get("/crontab/logPageList",[\plugin\admin\app\controller\system\SystemCrontabController::class, 'logPageList']);
    Route::delete('/crontab/deleteCrontabLog',[\plugin\admin\app\controller\system\SystemCrontabController::class, 'deleteCrontabLog']);

    Route::get("/dataMaintain/index",[plugin\admin\app\controller\tool\DataMaintainController::class, 'index']);
    Route::get("/dataMaintain/dataSource",[plugin\admin\app\controller\tool\DataMaintainController::class, 'source']);
    Route::get("/dataMaintain/detailed",[plugin\admin\app\controller\tool\DataMaintainController::class, 'detailed']);
    Route::post("/dataMaintain/optimize",[plugin\admin\app\controller\tool\DataMaintainController::class, 'optimize']);
    Route::post("/dataMaintain/fragment",[plugin\admin\app\controller\tool\DataMaintainController::class, 'fragment']);

});

Route::group('/tool', function () {
    fastRoute('code',\plugin\admin\app\controller\tool\GenerateTablesController::class);
    Route::post("/code/loadTable",[\plugin\admin\app\controller\tool\GenerateTablesController::class, 'loadTable']);
    Route::get("/code/getTableColumns",[\plugin\admin\app\controller\tool\GenerateTablesController::class, 'getTableColumns']);
    Route::get("/code/preview/{id}",[\plugin\admin\app\controller\tool\GenerateTablesController::class, 'preview']);
    Route::post("/code/generate",[\plugin\admin\app\controller\tool\GenerateTablesController::class, 'generate']);
    Route::post("/code/generateFile",[\plugin\admin\app\controller\tool\GenerateTablesController::class, 'generateFile']);
    Route::post("/code/sync/{id}",[\plugin\admin\app\controller\tool\GenerateTablesController::class, 'sync']);
});

Route::disableDefaultRoute('admin');