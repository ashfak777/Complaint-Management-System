package com.example.php_android;

import androidx.appcompat.app.AppCompatActivity;

import android.app.Activity;
import android.content.Intent;
import android.os.AsyncTask;
import android.os.Bundle;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.EditText;
import android.widget.ProgressBar;
import android.widget.RadioGroup;
import android.widget.Spinner;
import android.widget.Toast;

import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;

public class Main_home extends AppCompatActivity {

    EditText text1, text2, text3,text4,text5,text6,uuid;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main_home);

        text1 = (EditText) findViewById(R.id.text1);
        text2 = (EditText) findViewById(R.id.text2);
        text3 = (EditText) findViewById(R.id.text3);
        text4 = (EditText) findViewById(R.id.text4);
        text5 = (EditText) findViewById(R.id.text5);
        text6 = (EditText) findViewById(R.id.text6);

        findViewById(R.id.register).setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                registerUser();
            }
        });

        uuid = (EditText) findViewById(R.id.uid);

        user user = SharedPrefManager.getInstance(this).getUser();
        uuid.setText(String.valueOf(user.getId()));
    }

    private void registerUser() {

        final String t1 = text1.getText().toString().trim();
        final String t2 = text2.getText().toString().trim();
        final String t3 = text3.getText().toString().trim();
        final String t4 = text4.getText().toString().trim();
        final String t5 = text5.getText().toString().trim();
        final String t6 = text6.getText().toString().trim();
        final String sid = uuid.getText().toString();

        class RegisterUser extends AsyncTask<Void, Void, String> {

            private ProgressBar progressBar;

            @Override
            protected String doInBackground(Void... voids) {

                RequestHandler requestHandler = new RequestHandler();


                HashMap<String, String> params = new HashMap<>();
                params.put("caregory", t1);
                params.put("district", t2);
                params.put("description", t3);
                params.put("state", t4);
                params.put("home_address", t5);
                params.put("complain_type", t6);
                params.put("user_registration_id", sid);


                return requestHandler.sendPostRequest(Urls.URL_SAVE, params);
            }

            @Override
            protected void onPreExecute() {
                super.onPreExecute();

                progressBar = (ProgressBar) findViewById(R.id.progressBar);
                progressBar.setVisibility(View.VISIBLE);
            }

            @Override
            protected void onPostExecute(String s) {
                super.onPostExecute(s);

                progressBar.setVisibility(View.GONE);

                try {

                    JSONObject obj = new JSONObject(s);


                    if (!obj.getBoolean("error")) {
                        Toast.makeText(getApplicationContext(), obj.getString("message"), Toast.LENGTH_SHORT).show();

                    } else {
                        Toast.makeText(getApplicationContext(), "Some error occurred", Toast.LENGTH_SHORT).show();
                    }
                } catch (JSONException e) {
                    e.printStackTrace();
                }
            }
        }


        RegisterUser ru = new RegisterUser();
        ru.execute();

    }


}