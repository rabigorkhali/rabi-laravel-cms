<?php

use Carbon\Carbon;

function authUser()
{
    return Auth::user();
}


function generateToken($length)
{
    return bin2hex(openssl_random_pseudo_bytes($length));
}

function localDatetime($dateTime)
{
    return Carbon::parse($dateTime)->timezone('Asia/Kathmandu');
}


function paginate()
{
    return Config::get('constants.PAGINATE');
}

function pageIndex($items)
{
    $sn = 0;
    if (method_exists($items, 'perPage') && method_exists($items, 'currentPage')) {
        $sn = $items->perPage() * ($items->currentPage() - 1);
    }

    return $sn;
}

function SN($sn, $key)
{
    return $sn += $key + 1;
}

function getSystemPrefix()
{
    return env('SYSTEM_PREFIX', 'system');
}

function getImageUploadFirstLevelPath()
{
    return env('IMAGE_UPLOAD_PATH', 'uploads');
}

function getConfigTableData()
{
    return \App\Models\Config::first();
}

function modules()
{
    $modules = Config::get('cmsConfig.modules');
    return $modules;
}

function isPermissionSelected($permission, $permissions)
{
    $permission = json_decode($permission);
    $permissions = json_decode($permissions);
    $check = false;
    if (!is_array($permission)) {
        if ($permissions != null) {
            $exists = in_array($permission, $permissions);
            if ($exists) {
                $check = true;
            }
        }
    } else {
        $temCheck = false;
        if ($permissions != null) {
            foreach ($permission as $perm) {
                $exists = in_array($perm, $permissions);
                if ($exists) {
                    $temCheck = true;
                }
            }
        }
        $check = $temCheck;
    }

    return $check;
}

function hasPermission($url, $method = 'get')
{
    if (!authUser()) {
        return false;
    }
    $role = authUser()->role;
    $method = strtolower($method);
    $splittedUrl = explode('/' . getSystemPrefix(), $url);
    if (count($splittedUrl) > 1) {
        $url = $splittedUrl[1];
    } else {
        $url = $splittedUrl[0];
    }

    if ($role->id == 1) {
        $permissionDeniedToSuperUserRoutes = Config::get('cmsConfig.permissionDeniedToSuperUserRoutes');
        $checkDeniedRoute = true;
        foreach ($permissionDeniedToSuperUserRoutes as $route) {
            if (\Str::is($route['url'], $url) && $route['method'] == $method) {
                $checkDeniedRoute = false;
            }
        }

        return $checkDeniedRoute;
    }

    $permissionIgnoredUrls = Config::get('cmsConfig.permissionGrantedbyDefaultRoutes');

    $check = false;

    foreach ($permissionIgnoredUrls as $piurl) {
        if (\Str::is($piurl['url'], $url) && $piurl['method'] == $method) {
            $check = true;
        }
    }
    if ($check) {
        return true;
    }

    $permissions = $role->permissions;

    if ($permissions == null) {
        return false;
    }

    // foreach ($permissions as $piurl) {
    //     if (\Str::is($piurl['url'], $url) && $piurl['method'] == $method) {
    //         $check = true;
    //     }
    // }

    foreach ($permissions as $piurl) {
        if (fnmatch($piurl['url'], $url, FNM_PATHNAME) && $piurl['method'] == $method) {
            $check = true;
            break;
        }
    }
    if ($check) {
        return true;
    }

    return false;
}

function hasPermissionOnModule($module)
{
    $check = false;
    if (!$module['hasSubmodules']) {
        $check = hasPermission($module['route']);
    } else {
        try {
            foreach ($module['submodules'] as $submodule) {
                /* added third level */
                if (!$submodule['hasSubmodules']) {
                    /* after end third level if only two levels */
                    $check = hasPermission($submodule['route']);
                    if ($check == true) {
                        break;
                    }
                    /**/
                } else {
                    try {
                        foreach ($submodule['submodules'] as $childModule) {
                            $check = hasPermission($childModule['route']);
                            if ($check == true) {
                                break;
                            }
                        }
                    } catch (\Exception $e) {
                        return false;
                    }
                }
                /* end third level */
            }
        } catch (\Exception $e) {
            return false;
        }
    }

    return $check;
}

function cssIndexProgramColorsRandom()
{
    $colors = ["green", "blue", "purple", "pink", "black"];
    return $colors[array_rand($colors)];
}
