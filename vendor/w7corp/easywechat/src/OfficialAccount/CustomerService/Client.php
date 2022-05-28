<?php

/*
 * This file is part of the overtrue/wechat.
 *
 * (c) overtrue <i@overtrue.me>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */
namespace EasyWeChat\OfficialAccount\CustomerService;

use EasyWeChat\Kernel\BaseClient;
/**
 * Class Client.
 *
 * @author overtrue <i@overtrue.me>
 */
class Client extends BaseClient
{
    /**
     * List all staffs.
     *
     * @return mixed
     *
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     */
    public function lists()
    {
        return $this->httpGet('cgi-bin/customservice/getkflist');
    }
    /**
     * List all online staffs.
     *
     * @return mixed
     *
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     */
    public function online()
    {
        return $this->httpGet('cgi-bin/customservice/getonlinekflist');
    }
    /**
     * Create a staff.
     *
     * @param $account
     * @param $nickname
     *
     * @return mixed
     *
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function create($account, $nickname)
    {
        $params = ['kf_account' => $account, 'nickname' => $nickname];
        return $this->httpPostJson('customservice/kfaccount/add', $params);
    }
    /**
     * Update a staff.
     *
     * @param $account
     * @param $nickname
     *
     * @return mixed
     *
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function update($account, $nickname)
    {
        $params = ['kf_account' => $account, 'nickname' => $nickname];
        return $this->httpPostJson('customservice/kfaccount/update', $params);
    }
    /**
     * Delete a staff.
     *
     * @param $account
     *
     * @return \Psr\Http\Message\ResponseInterface|\EasyWeChat\Kernel\Support\Collection|array|object|string
     *
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function delete($account)
    {
        return $this->httpPostJson('customservice/kfaccount/del', [], ['kf_account' => $account]);
    }
    /**
     * Invite a staff.
     *
     * @param $account
     * @param $wechatId
     *
     * @return mixed
     *
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function invite($account, $wechatId)
    {
        $params = ['kf_account' => $account, 'invite_wx' => $wechatId];
        return $this->httpPostJson('customservice/kfaccount/inviteworker', $params);
    }
    /**
     * Set staff avatar.
     *
     * @param $account
     * @param $path
     *
     * @return mixed
     *
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function setAvatar($account, $path)
    {
        return $this->httpUpload('customservice/kfaccount/uploadheadimg', ['media' => $path], [], ['kf_account' => $account]);
    }
    /**
     * Get message builder.
     *
     * @param \EasyWeChat\Kernel\Messages\Message|$message
     *
     * @return \EasyWeChat\OfficialAccount\CustomerService\Messenger
     */
    public function message($message)
    {
        $messageBuilder = new Messenger($this);
        return $messageBuilder->message($message);
    }
    /**
     * Send a message.
     *
     * @param array $message
     *
     * @return mixed
     *
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function send(array $message)
    {
        return $this->httpPostJson('cgi-bin/message/custom/send', $message);
    }
    /**
     * Show typing status.
     *
     * @param $openid
     *
     * @return mixed
     *
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function showTypingStatusToUser($openid)
    {
        return $this->httpPostJson('cgi-bin/message/custom/typing', ['touser' => $openid, 'command' => 'Typing']);
    }
    /**
     * Hide typing status.
     *
     * @param $openid
     *
     * @return mixed
     *
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function hideTypingStatusToUser($openid)
    {
        return $this->httpPostJson('cgi-bin/message/custom/typing', ['touser' => $openid, 'command' => 'CancelTyping']);
    }
    /**
     * Get messages history.
     *
     * @param int $startTime
     * @param int $endTime
     * @param int $msgId
     * @param int $number
     *
     * @return mixed
     *
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function messages($startTime, $endTime, $msgId = 1, $number = 10000)
    {
        $params = ['starttime' => is_numeric($startTime) ? $startTime : strtotime($startTime), 'endtime' => is_numeric($endTime) ? $endTime : strtotime($endTime), 'msgid' => $msgId, 'number' => $number];
        return $this->httpPostJson('customservice/msgrecord/getmsglist', $params);
    }
}