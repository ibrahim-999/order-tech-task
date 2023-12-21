<?php

namespace App\Traits;


use App\Enums\HttpRequestStatusEnum;
use Illuminate\Http\Resources\Json\JsonResource;

trait ApiResponseTrait
{
    public function failPermissionMessage($errors)
    {
        return [
            'success' => false,
            'type' => 'error',
            'code' => $this->status_code_401,
            'reason' => 'Permissions',
            'message' => trans('messages.permission_denied'),
            'errors' => $errors,
        ];
    }

    public function failExceptionMessage($error_code, $file, $line, $message)
    {
        $data = [
            'success' => false,
            'type' => 'error',
            'code' => HttpRequestStatusEnum::STATUS_BAD_REQUEST->value,
            'reason' => 'Exceptions',
            'message' => $message,
            'error_code' => $error_code,
            'file' => $file,
            'line' => $line,
        ];

        info(implode(', ', $message));

        return response()->json($data, HttpRequestStatusEnum::STATUS_BAD_REQUEST->value);
    }

    public function failResourceNotFoundMessage($resource_name = null,$message = null)
    {
        $data = [
            'success' => false,
            'type' => 'error',
            'code' => HttpRequestStatusEnum::STATUS_NOT_FOUND->value,
            'reason' => 'Record',
            'message' => empty($message) ? (is_null($resource_name)) ? trans('messages.Resource_not_found') : $resource_name . ' ' . trans('messages.not_found') : $message,
        ];
        return response()->json($data, HttpRequestStatusEnum::STATUS_NOT_FOUND->value);

    }

    public function successShowDataResponse($data=[], $reason = 'Show',$message=null)
    {
        $data = [
            'success' => true,
            'type' => 'success',
            'code' => HttpRequestStatusEnum::STATUS_OK->value,
            'data' => (object)$data,
            'reason' => $reason,
            'message' => $message ?? trans('messages.resource_details'),
        ];
        return response()->json($data, HttpRequestStatusEnum::STATUS_OK->value);

    }
    public function successShowPaginationResponse($data=[],$meta, $reason = 'Show')
    {
        $data = [
            'success' => true,
            'type' => 'success',
            'code' => HttpRequestStatusEnum::STATUS_OK->value,
            'data' => (object)$data,
            'meta' => $meta,
            'reason' => $reason,
            'message' => trans('messages.resource_details'),
        ];
        return response()->json($data, HttpRequestStatusEnum::STATUS_OK->value);

    }
    public function successShowPaginatedDataResponse(JsonResource $data, $reason = 'Show')
    {
//        $body = [
//            'success' => true,
//            'type' => 'success',
//            'code' => HttpRequestStatusEnum::STATUS_OK->value,
//            'data' => $data,
//            'count' => $data->count(),
//            'reason' => $reason,
//            'message' => trans('messages.resource_details'),
//        ];
        return response()->json($data,HttpRequestStatusEnum::STATUS_OK->value);

    }

    public function successShowMessage()
    {
        return [
            'success' => true,
            'type' => 'success',
            'code' => $this->status_code_200,
            'reason' => 'Show',
            'message' => trans('messages.resource_details'),
        ];
    }

    public function successListMessage($data)
    {
        return [
            'success' => true,
            'type' => 'success',
            'reason' => 'List',
            'data' => $data,
            'code' => HttpRequestStatusEnum::STATUS_OK->value,
            'message' => 'Resources listed successfully',
        ];
    }

    public function successCreateMessage($message)
    {
        return [
            'success' => true,
            'type' => 'success',
            'code' => HttpRequestStatusEnum::STATUS_CREATED->value,
            'reason' => 'Store',
            'message' => $message,
        ];
    }

    public function failCreateMessage()
    {
        return [
            'success' => false,
            'type' => 'error',
            'code' => $this->status_code_304,
            'reason' => 'Failure',
            'message' => trans('messages.Resource_not_created'),
        ];
    }
    public function failServerMessage()
    {
        return [
            'success' => false,
            'type' => 'error',
            'code' => HttpRequestStatusEnum::STATUS_SERVER_ERROR->value,
            'reason' => 'Failure',
            'message' => trans('messages.SERVER_ERROR'),
        ];
    }

    public function successDeleteMessage($message=null)
    {
        return [
            'success' => true,
            'type' => 'success',
            'code' => HttpRequestStatusEnum::STATUS_OK->value,
            'reason' => 'Delete',
            'message' => $message ??trans('messages.Resource_deleted_successfully'),
        ];
    }

    public function failDeleteMessage()
    {
        return [
            'success' => false,
            'type' => 'error',
            'code' => HttpRequestStatusEnum::STATUS_NOT_MODIFIED->value,
            'reason' => 'Failure',
            'message' => trans('messages.Resource_not_deleted'),
        ];
    }

}
