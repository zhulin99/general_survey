<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>工业源</title>

    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/laydate/laydate.js"></script>
    <script type="text/javascript" src="js/puchaform.js"></script>

    <link rel="stylesheet" href="css/ssi-uploader.css"/>
    <link rel="stylesheet" href="css/puchaform_base.css"/>
</head>

<body>
<div class="panel admin-panel">
  <div class="puchaform_form_head">普查表单-工业源</div>
  <div class="body-content">
      <form class="puchaform_base" id="industry_form">
          <fieldset id="baseinfo">
              <legend>基本信息</legend>
              <div class="item">
                  <div class="left"><label>单位名称：</label></div>
                  <div class="right"><input type="text" name="unit_name"/></div>
                  <div class="necessary"></div>
              </div>
              <div class="item">
                  <div class="left"><label>单位代码：</label></div>
                  <div class="right"><input type="text" name="unit_code" /></div>
                  <div class="necessary"></div>
              </div>
              <div class="item">
                  <div class="left"><label>法人代表：</label></div>
                  <div class="right"><input type="text" name="unit_peop" /></div>
                  <div class="necessary"></div>
              </div>
              <div class="item">
                  <div class="left"><label>所在地：</label></div>
                  <div class="right"><input type="text" name="adress"/></div>
                  <div class="necessary"></div>
              </div>
              <div class="item">
                  <div class="left"><label>经纬度：</label></div>
                  <div class="right">
                      <input type="text" name="coordX" placeholder="经度" style="width: 92px;"/>
                      <input type="text" name="coordY" placeholder="纬度" style="width:92px;"/>
                  </div>
                  <div class="necessary"></div>
              </div>
              <div class="item">
                  <div class="left"><label>联系方式：</label></div>
                  <div class="right"><input type="text" name="tel" /></div>
                  <div class="necessary"></div>
              </div>

              <div class="item">
                  <div class="left"><label>开业时间：</label></div>
                  <div class="right"><input type="text" name="startTime" style="width: 180px;" class="laydate-icon" onClick="laydate()" readonly="true"/></div>
                  <div class="necessary"></div>
              </div>

              <div class="item" style="height: auto;">
                  <div class="left"><label>经营范围：</label></div>
                  <div class="right" style="height: auto; margin-top: 8px;">
                      <select name="businessRange" style="width:208px; height: 25px; padding-left: 10px; border-radius: 5px; border: solid 1px #999;">
                          <option value ="volvo">Volvo</option>
                          <option value ="saab">Saab</option>
                          <option value="opel">Opel</option>
                          <option value="audi">Audi</option>
                      </select>
                  </div>
                  <div class="necessary"></div>
              </div>
          </fieldset>

          <fieldset>
              <legend>水污染</legend>

              <div class="item">
                  <div class="left"><label>GOD：</label></div>
                  <div class="right"><input type="text" name="w_god" /></div>
              </div>
              <div class="item">
                  <div class="left"><label>氨氮：</label></div>
                  <div class="right"><input type="text" name="w_andan" /></div>
              </div>
              <div class="item">
                  <div class="left"><label>总磷：</label></div>
                  <div class="right"><input type="text" name="w_lin" /></div>
              </div>
              <div class="item">
                  <div class="left"><label>总氮：</label></div>
                  <div class="right"><input type="text" name="w_dan" /></div>
              </div>
              <div class="item">
                  <div class="left"><label>石油类：</label></div>
                  <div class="right"><input type="text" name="w_shiyou" /></div>
              </div>
              <div class="item">
                  <div class="left"><label>挥发酚：</label></div>
                  <div class="right"><input type="text" name="w_fen" /></div>
              </div>
              <div class="item">
                  <div class="left"><label>氰化物：</label></div>
                  <div class="right"><input type="text" name="w_jing" /></div>
              </div>
              <div class="item">
                  <div class="left"><label>汞：</label></div>
                  <div class="right"><input type="text" name="w_gong" /></div>
              </div>
              <div class="item">
                  <div class="left"><label>镉：</label></div>
                  <div class="right"><input type="text" name="w_geCd" /></div>
              </div>
              <div class="item">
                  <div class="left"><label>铅：</label></div>
                  <div class="right"><input type="text" name="w_qian" /></div>
              </div>
              <div class="item">
                  <div class="left"><label>铬：</label></div>
                  <div class="right"><input type="text" name="w_geCr" /></div>
              </div>
              <div class="item">
                  <div class="left"><label>砷：</label></div>
                  <div class="right"><input type="text" name="w_shen" /></div>
              </div>
          </fieldset>

          <fieldset>
              <legend>大气污染</legend>
              <div class="item">
                  <div class="left"><label>SO2：</label></div>
                  <div class="right"><input type="text" name="a_so2" /></div>
              </div>
              <div class="item">
                  <div class="left"><label>NOX：</label></div>
                  <div class="right"><input type="text" name="a_nox" /></div>
              </div>
              <div class="item">
                  <div class="left"><label>颗粒物：</label></div>
                  <div class="right"><input type="text" name="a_keliwu" /></div>
              </div>
              <div class="item">
                  <div class="left"><label>VOCs：</label></div>
                  <div class="right"><input type="text" name="a_vocs" /></div>
              </div>
              <div class="item">
                  <div class="left"><label>NH3：</label></div>
                  <div class="right"><input type="text" name="a_nh3" /></div>
              </div>
              <div class="item">
                  <div class="left"><label>汞：</label></div>
                  <div class="right"><input type="text" name="a_gong" /></div>
              </div>
              <div class="item">
                  <div class="left"><label>镉：</label></div>
                  <div class="right"><input type="text" name="a_geCd" /></div>
              </div>
              <div class="item">
                  <div class="left"><label>铅：</label></div>
                  <div class="right"><input type="text" name="a_qian" /></div>
              </div>
              <div class="item">
                  <div class="left"><label>铬：</label></div>
                  <div class="right"><input type="text" name="a_geCr" /></div>
              </div>
              <div class="item">
                  <div class="left"><label>砷：</label></div>
                  <div class="right"><input type="text" name="a_shen" /></div>
              </div>
          </fieldset>

      </form>

      <div class="puchaform_base">
          <fieldset>
              <legend>照片上传</legend>
              <div class="upload_image" style="width: 100%; height: auto;">
                  <input type="file" multiple id="ssi-upload"/>
              </div>
          </fieldset>
      </div>

      <div class="puchaform_base" style="margin-top: 30px; margin-bottom: 100px; height: 40px;">
          <button class="submit" type="button" onclick="submitForm()">提&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;交</button>
      </div>

  </div>
</div>



<script src="js/ssi-uploader.js"></script>
<script type="text/javascript">
    $('#ssi-upload').ssi_uploader({
        url:'utils/uploadfile.php',
        maxFileSize:20,
        allowed:['jpg','gif','png','jpeg']
    });
</script>

</body>
</html>