<?php


namespace App\Services;

use App\Exceptions\ApiLevelException;


use Symfony\Component\HttpFoundation\Response;

/**
 * الخدمة المخصصة للتعامل مع اخطاء التطبيق
 * تحوي فقط دوال جاهزة للاستدعاء
 * كل دالة يجب ان تحمل رسالة الخطا ورقم الخطا http
 * فقط يتم استدعاء الدالة لقذف الخطا
 */

class ExceptionService
{

    const ERROR_FILE = 'exceptions';

    public static function authRequired()
    {
        $key = 'auth-required';

        $trans_key = sprintf("%s.%s", self::ERROR_FILE, $key);

        throw new ApiLevelException(
            error_key: $key,
            custom_message: __($trans_key),
            code: Response::HTTP_UNAUTHORIZED,
            details: [],
        );
    }
    public static function invalidCredentials()
    {
        $key = 'invalid-credentials';

        $trans_key = sprintf("%s.%s", self::ERROR_FILE, $key);

        throw new ApiLevelException(
            error_key: $key,
            custom_message: __($trans_key),
            code: Response::HTTP_UNAUTHORIZED,
            details: [],
        );
    }
    public static function unauthorizedAction(array $details = [])
    {
        $key = 'unauthorized-action';

        $trans_key = sprintf("%s.%s", self::ERROR_FILE, $key);

        throw new ApiLevelException(
            error_key: $key,
            custom_message: __($trans_key),
            code: Response::HTTP_FORBIDDEN,
            details: $details,
        );
    }


    public static function validation($details)
    {
        $key = 'validation';

        $trans_key = sprintf("%s.%s", self::ERROR_FILE, $key);

        throw new ApiLevelException(
            error_key: $key,
            custom_message: __($trans_key),
            code: Response::HTTP_UNPROCESSABLE_ENTITY,
            details: $details,
        );
    }

    /**
     * @return ApiLevelException
     */
    public static function unhandledExceptionThrowable(): ApiLevelException
    {
        $key = 'unhandled-exception';

        $trans_key = sprintf("%s.%s", self::ERROR_FILE, $key);

        return new ApiLevelException(
            error_key: $key,
            custom_message: __($trans_key),
            code: Response::HTTP_INTERNAL_SERVER_ERROR,
            details: [],
        );
    }


    public static function createFailed()
    {
        $key = 'create-failed';

        $trans_key = sprintf("%s.%s", self::ERROR_FILE, $key);

        throw new ApiLevelException(
            error_key: $key,
            custom_message: __($trans_key),
            code: Response::HTTP_INTERNAL_SERVER_ERROR,
            details: [],
        );
    }

    public static function notFound($details = [])
    {
        $key = 'not-found';

        $trans_key = sprintf("%s.%s", self::ERROR_FILE, $key);

        throw new ApiLevelException(
            error_key: $key,
            custom_message: __($trans_key),
            code: Response::HTTP_NOT_FOUND,
            details: $details,
        );
    }

    public static function updateFailed()
    {
        $key = 'update-failed';

        $trans_key = sprintf("%s.%s", self::ERROR_FILE, $key);

        throw new ApiLevelException(
            error_key: $key,
            custom_message: __($trans_key),
            code: Response::HTTP_INTERNAL_SERVER_ERROR,
            details: [],
        );
    }

    public static function deleteFailed()
    {
        $key = 'delete-failed';

        $trans_key = sprintf("%s.%s", self::ERROR_FILE, $key);

        throw new ApiLevelException(
            error_key: $key,
            custom_message: __($trans_key),
            code: Response::HTTP_INTERNAL_SERVER_ERROR,
            details: [],
        );
    }

    public static function accountAlreadyVerified()
    {
        $key = 'account-verified';

        $trans_key = sprintf("%s.%s", self::ERROR_FILE, $key);

        throw new ApiLevelException(
            error_key: $key,
            custom_message: __($trans_key),
            code: Response::HTTP_BAD_REQUEST,
            details: [],
        );
    }

    public static function resendMailFailed()
    {
        $key = 'resend-mail-failed';

        $trans_key = sprintf("%s.%s", self::ERROR_FILE, $key);

        throw new ApiLevelException(
            error_key: $key,
            custom_message: __($trans_key),
            code: Response::HTTP_INTERNAL_SERVER_ERROR,
            details: [],
        );
    }



    public static function invalidToken()
    {
        $key = 'invalid-token';

        $trans_key = sprintf("%s.%s", self::ERROR_FILE, $key);

        throw new ApiLevelException(
            error_key: $key,
            custom_message: __($trans_key),
            code: Response::HTTP_BAD_REQUEST,
            details: [],
        );
    }

    public static function branchIdRequired()
    {
        $key = 'branch-id-required';

        $trans_key = sprintf("%s.%s", self::ERROR_FILE, $key);

        throw new ApiLevelException(
            error_key: $key,
            custom_message: __($trans_key),
            code: Response::HTTP_BAD_REQUEST,
            details: [],
        );
    }
    public static function useYourBranchOnly()
    {
        $key = 'use-your-branch-only';

        $trans_key = sprintf("%s.%s", self::ERROR_FILE, $key);

        throw new ApiLevelException(
            error_key: $key,
            custom_message: __($trans_key),
            code: Response::HTTP_FORBIDDEN,
            details: [],
        );
    }
}
