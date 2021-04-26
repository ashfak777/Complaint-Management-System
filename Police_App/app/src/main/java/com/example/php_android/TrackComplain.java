package com.example.php_android;

import androidx.appcompat.app.AppCompatActivity;

import android.app.ProgressDialog;
import android.os.AsyncTask;
import android.os.Bundle;
import android.view.View;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

import org.json.JSONObject;

import java.util.HashMap;

public class TrackComplain extends AppCompatActivity {

    private EditText etId,uuid;
    private TextView tvName, tvPrice, tvDesc,tvdate;

    public static final String URL_SHOW_PROD = "http://192.168.8.148/Php_api/show.php";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_track_complain);
        etId = findViewById(R.id.id);

        tvName = findViewById(R.id.showname);
        tvPrice = findViewById(R.id.showprice);
        tvDesc = findViewById(R.id.showdesc);
        tvdate = findViewById(R.id.date);

        uuid = (EditText) findViewById(R.id.uid);

        user user = SharedPrefManager.getInstance(this).getUser();
        uuid.setText(String.valueOf(user.getId()));
    }

    public void show_prod(View view){
        final String id = etId.getText().toString();
        final String sid = uuid.getText().toString();

        class show_prod extends AsyncTask<Void, Void, String> {

            ProgressDialog pdLoading = new ProgressDialog(TrackComplain.this);

            @Override
            protected void onPreExecute() {
                super.onPreExecute();

                //this method will be running on UI thread
                pdLoading.setMessage("\tLoading...");
                pdLoading.setCancelable(false);
                pdLoading.show();
            }

            @Override
            protected String doInBackground(Void... voids) {
                //creating request handler object
                RequestHandler requestHandler = new RequestHandler();

                //creating request parameters
                HashMap<String, String> params = new HashMap<>();
                params.put("idcomplain", id);
                params.put("user_registration_id", sid);

                //returing the response
                return requestHandler.sendPostRequest(URL_SHOW_PROD, params);
            }

            @Override
            protected void onPostExecute(String s){
                super.onPostExecute(s);
                pdLoading.dismiss();

                try{
                    //Converting response to JSON Object
                    JSONObject obj = new JSONObject(s);

                    //if no error in response
                    if (!obj.getBoolean("error")){
                        Toast.makeText(TrackComplain.this, obj.getString("message"), Toast.LENGTH_LONG).show();
                        //Make TextViews Visible
                        tvName.setVisibility(View.VISIBLE);
                        tvPrice.setVisibility(View.VISIBLE);
                        tvDesc.setVisibility(View.VISIBLE);
                        tvdate.setVisibility(View.VISIBLE);
                        //Set retrieved text to TextViews
                        tvName.setText("Catgeory: "+obj.getString("caregory"));
                        tvPrice.setText("Description: "+obj.getString("description"));
                        tvDesc.setText("Status: "+obj.getString("status"));
                        tvdate.setText("Date: "+obj.getString("date"));
                    }
                } catch (Exception e ){
                    Toast.makeText(TrackComplain.this, "Exception: "+e, Toast.LENGTH_SHORT).show();
                }
            }
        }

        show_prod show = new show_prod();
        show.execute();
    }

}