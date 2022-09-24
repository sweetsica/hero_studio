<?php

namespace App\Http\Traits;

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

/** Các status code thường được sử dụng */
const exampleStatusCode = [
    'success' => ResponseAlias::HTTP_OK, /** Api thực thi thành công */
    'error' => ResponseAlias::HTTP_INTERNAL_SERVER_ERROR, /** Api lỗi , có thể dùng bất kì khi nào thất bại */

    'not_found' => ResponseAlias::HTTP_NOT_FOUND,  /** Có thứ gì đó khi thực thi api không được tìm thấy */
    'bad_request' => ResponseAlias::HTTP_BAD_REQUEST, /** Dữ liệu truyền lên bị lỗi, không đúng với yêu cầu , vd user_id nhưng truyền lên email */
    'permission_denied' => ResponseAlias::HTTP_FORBIDDEN, /** Đang cố truy cập tài nguyên không đủ quyền hạn */
    'created' => ResponseAlias::HTTP_CREATED, /** Thêm vào cho vui vì còn vẫn nhiều mã lỗi khác  */
];

trait HasResponseApi
{
    protected mixed $apiData = null;
    protected array $apiMessages = [];
    protected int $apiStatusCode = ResponseAlias::HTTP_OK; // Default success

    /**
     * Set status response , default 200
     * @param int $code
     * @return $this
     */
    protected function setApiStatusCode(int $code): static
    {
        $this->apiStatusCode = $code;

        return $this;
    }

    /**
     * Set message response api
     * @param string $message
     * @return $this
     */
    protected function setApiMessage(string $message): static
    {
        $this->apiMessages[] = $message;

        return $this;
    }

    /**
     * Set response data
     * @param $data
     * @return $this
     */
    protected function setApiData($data)
    {
        $this->apiData = $data;

        return $this;
    }

    protected function apiResponse($data = null, $status = null, $message = null): JsonResponse
    {
        if ($message || $this->apiMessages) {
            $params['messages'] = $message ?? $this->apiMessages;
        }
        $params['data'] = $data ?? $this->apiData;
        $statusCode = $status ?? $this->apiStatusCode;

        return response()
            ->json($params, $statusCode);
    }

    protected function apiSuccessResponse(): JsonResponse
    {
        return $this->apiResponse();
    }

    protected function apiErrorResponse(string $message = null): JsonResponse
    {
        if ($message) $this->setApiMessage($message);

        return $this->apiResponse();
    }
}
