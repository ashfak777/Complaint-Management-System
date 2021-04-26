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

public class Complain_history extends AppCompatActivity {

    private TextView tvone, tvtwo, tvthree,tvfour,tvfive,tvsix,tvseven,tveight,tvnine;
    private EditText uuid;

    public static final String URL_SHOW_PROD = "http://192.168.8.148/Police_projects/show_history.php";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_complain_history);

        tvone = findViewById(R.id.one);
        tvtwo = findViewById(R.id.two);
        tvthree = findViewById(R.id.three);
        tvfour = findViewById(R.id.four);
        tvfive = findViewById(R.id.five);
        tvsix = findViewById(R.id.six);
        tvseven = findViewById(R.id.seven);
        tveight = findViewById(R.id.eight);
        tvnine = findViewById(R.id.nine);

        uuid = (EditText) findViewById(R.id.uid);

        user user = SharedPrefManager.getInstance(this).getUser();
        uuid.setText(String.valueOf(user.getId()));
    }

    public void show_prod(View view){

        final String sid = uuid.getText().toString();

        class show_prod extends AsyncTask<Void, Void, String> {

            ProgressDialog pdLoading = new ProgressDialog(Complain_history.this);

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
                        Toast.makeText(Complain_history.this, obj.getString("message"), Toast.LENGTH_LONG).show();
                        //Make TextViews Visible
                        tvone.setVisibility(View.VISIBLE);
                        tvtwo.setVisibility(View.VISIBLE);
                        tvthree.setVisibility(View.VISIBLE);
                        tvfour.setVisibility(View.VISIBLE);
                        tvfive.setVisibility(View.VISIBLE);
                        tvsix.setVisibility(View.VISIBLE);
                        tvseven.setVisibility(View.VISIBLE);
                        tveight.setVisibility(View.VISIBLE);
                        tvnine.setVisibility(View.VISIBLE);
                        //Set retrieved text to TextViews
                        tvone.setText("Complain Id: "+obj.getString("idcomplain"));
                        tvtwo.setText("Category: "+obj.getString("caregory"));
                        tvthree.setText("District: "+obj.getString("district"));
                        tvfour.setText("Description: "+obj.getString("description"));
                        tvfive.setText("State: "+obj.getString("state"));
                        tvsix.setText("Home Address: "+obj.getString("home_address"));
                        tvseven.setText("Complain Type: "+obj.getString("complain_type"));
                        tveight.setText("Status: "+obj.getString("status"));
                        tvnine.setText("Date: "+obj.getString("date"));
                    }
                } catch (Exception e ){
                    Toast.makeText(Complain_history.this, "Exception: "+e, Toast.LENGTH_SHORT).show();
                }
            }
        }

        show_prod show = new show_prod();
        show.execute();
    }
}