package info.zonglovani.mobile.app;

import android.os.Bundle;
import org.apache.cordova.*;

public class Zonglovani extends CordovaActivity 
{
    @Override
    public void onCreate(Bundle savedInstanceState)
    {
        super.onCreate(savedInstanceState);
        super.init();
        super.loadUrl(Config.getStartUrl());
    }
}
