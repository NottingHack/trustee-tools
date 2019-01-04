<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
  <style>
    /* Base */

    body, body *:not(html):not(style):not(br):not(tr):not(code) {
      font-family: Avenir, Helvetica, sans-serif;
      box-sizing: border-box;
    }

    body {
      background-color: #f5f8fa;
      color: #74787E;
      height: 100%;
      hyphens: auto;
      line-height: 1.4;
      margin: 0;
      -moz-hyphens: auto;
      -ms-word-break: break-all;
      width: 100% !important;
      -webkit-hyphens: auto;
      -webkit-text-size-adjust: none;
      word-break: break-all;
      word-break: break-word;
    }

    p,
    ul,
    ol,
    blockquote {
      line-height: 1.4;
      text-align: left;
    }

    a {
      color: #3869D4;
    }

    a img {
      border: none;
    }

    /* Typography */

    h1 {
      color: #2F3133;
      font-size: 19px;
      font-weight: bold;
      margin-top: 0;
      text-align: left;
    }

    h2 {
      color: #2F3133;
      font-size: 16px;
      font-weight: bold;
      margin-top: 0;
      text-align: left;
    }

    h3 {
      color: #2F3133;
      font-size: 14px;
      font-weight: bold;
      margin-top: 0;
      text-align: left;
    }

    p {
      color: #74787E;
      font-size: 16px;
      line-height: 1.5em;
      margin-top: 0;
      text-align: left;
    }

    img {
      max-width: 100%;
    }

    /* Layout */

    .wrapper {
      background-color: #f5f8fa;
      margin: 0;
      padding: 0;
      width: 100%;
      -premailer-cellpadding: 0;
      -premailer-cellspacing: 0;
      -premailer-width: 100%;
    }

    .content {
      margin: 0;
      padding: 0;
      width: 100%;
      -premailer-cellpadding: 0;
      -premailer-cellspacing: 0;
      -premailer-width: 100%;
    }

    /* Header */

    .header {
      padding: 25px 0;
      text-align: center;
    }

    .header a {
      color: #bbbfc3;
      font-size: 19px;
      font-weight: bold;
      text-decoration: none;
      text-shadow: 0 1px 0 white;
    }

    /* Body */

    .body {
      background-color: #FFFFFF;
      border-bottom: 1px solid #EDEFF2;
      border-top: 1px solid #EDEFF2;
      margin: 0;
      padding: 0;
      width: 100%;
      -premailer-cellpadding: 0;
      -premailer-cellspacing: 0;
      -premailer-width: 100%;
    }

    .inner-body {
      background-color: #FFFFFF;
      margin: 0 auto;
      padding: 0;
      width: 570px;
      -premailer-cellpadding: 0;
      -premailer-cellspacing: 0;
      -premailer-width: 570px;
    }

    /* Footer */

    .footer {
      margin: 0 auto;
      padding: 0;
      text-align: center;
      width: 570px;
      height: 20px;
      -premailer-cellpadding: 0;
      -premailer-cellspacing: 0;
      -premailer-width: 570px;
    }

    .footer p {
      color: #AEAEAE;
      font-size: 12px;
      text-align: center;
    }

    /* Tables */

    .table table {
      margin: 30px auto;
      width: 100%;
      -premailer-cellpadding: 0;
      -premailer-cellspacing: 0;
      -premailer-width: 100%;
    }

    .table th {
      border-bottom: 1px solid #EDEFF2;
      padding-bottom: 8px;
      margin: 0;
    }

    .table td {
      color: #74787E;
      font-size: 15px;
      line-height: 18px;
      padding: 10px 0;
      margin: 0;
    }

    .content-cell {
      padding: 35px;
    }

    @media only screen and (max-width: 600px) {
      .inner-body {
        width: 100% !important;
      }
      .footer {
        width: 100% !important;
      }
    }
    @media only screen and (max-width: 500px) {
      .button {
        width: 100% !important;
      }
    }
  </style>

  <table class="wrapper" width="100%" cellpadding="0" cellspacing="0">
    <tr>
      <td align="center">
        <table class="content" width="100%" cellpadding="0" cellspacing="0">
          <tr>
            <td class="header">
              <a href="https://nottinghack.org.uk">
                <img src="https://wiki.nottinghack.org.uk/nottinghack_small.png">
              </a>
            </td>
          </tr>

          <!-- Email Body -->
          <tr>
            <td class="body" width="100%" cellpadding="0" cellspacing="0">
              <table class="inner-body" align="center" width="570" cellpadding="0" cellspacing="0">
                <!-- Body content -->
                <tr>
                  <td class="content-cell">
                    <h1>Hello %recipient.name%,</h1>
                    {!! $htmlContent !!}
                  </td>
                </tr>
              </table>
            </td>
          </tr>

          <tr>
            <td>
              <table class="footer" align="center" width="570" cellpadding="0" cellspacing="0">
                <tr>
                  <td class="content-cell" align="center">
                    This email was sent by Nottingham Hackspace Trustees to you as a current member of Nottingham Hackspace
                  </td>
                </tr>
              </table>
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
</body>
</html>
