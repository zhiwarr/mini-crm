<?php

namespace App;

enum PermissionEnum : string
{
    case MANAGE_USER = 'manage_user';
    case DELETE_CLIENT = 'delete_client';
    case DELETE_PROJECT = 'delete_project';
    case DELETE_TASK = 'delete_task';
}