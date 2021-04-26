package com.example.php_android;

import androidx.appcompat.app.AppCompatActivity;
import androidx.loader.content.AsyncTaskLoader;

import android.app.Activity;
import android.content.Intent;
import android.os.AsyncTask;
import android.os.Bundle;
import android.text.TextUtils;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.EditText;
import android.widget.ProgressBar;
import android.widget.RadioButton;
import android.widget.Spinner;
import android.widget.TextView;
import android.widget.Toast;

import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;

public class Complain_register extends AppCompatActivity {

    EditText home_address, details;
    String spinner1,spinner2,spinner3,spinner4;
    String uid = "";


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_complain_register);
        uid=getSharedPreferences("MyPrefs",MODE_PRIVATE).getString("id","");

        home_address = (EditText) findViewById(R.id.home_address);
        details = (EditText) findViewById(R.id.details);


        Spinner static1= (Spinner) findViewById(R.id.spinner1);
        ArrayAdapter<CharSequence> staticAdapter = ArrayAdapter
                .createFromResource(this, R.array.array1,
                        android.R.layout.simple_spinner_item);
        staticAdapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        static1.setAdapter(staticAdapter);

        Spinner static2= (Spinner) findViewById(R.id.spinner2);
        ArrayAdapter<CharSequence> staticAdapter2 = ArrayAdapter
                .createFromResource(this, R.array.array2,
                        android.R.layout.simple_spinner_item);
        staticAdapter2.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        static2.setAdapter(staticAdapter2);

        Spinner static3= (Spinner) findViewById(R.id.spinner3);
        ArrayAdapter<CharSequence> staticAdapter3 = ArrayAdapter
                .createFromResource(this, R.array.array3,
                        android.R.layout.simple_spinner_item);
        staticAdapter3.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        static3.setAdapter(staticAdapter3);

        Spinner static4= (Spinner) findViewById(R.id.spinner4);
        ArrayAdapter<CharSequence> staticAdapter4 = ArrayAdapter
                .createFromResource(this, R.array.array4,
                        android.R.layout.simple_spinner_item);
        staticAdapter4.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        static4.setAdapter(staticAdapter4);



        class SpinnerActivity extends Activity implements AdapterView.OnItemSelectedListener {

            public void onItemSelected(AdapterView<?> parent, View view,
            int pos, long id) {
                spinner1 =parent.getSelectedItem().toString();
                spinner2 =parent.getSelectedItem().toString();
                spinner3 =parent.getSelectedItem().toString();
                spinner4 =parent.getSelectedItem().toString();
            }

            public void onNothingSelected(AdapterView<?> parent) {

            }
        }


        findViewById(R.id.register).setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                registerComplain();
            }
        });
    }



    private void registerComplain() {
        final String add = home_address.getText().toString().trim();
        final String dea = details.getText().toString().trim();

        final String s1 = spinner1;
        final String s2 = spinner1;
        final String s3 = spinner1;
        final String s4 = spinner1;


        class RegisterComplain extends AsyncTask<Void, Void, String> {

            private ProgressBar progressBar;

            @Override
            protected String doInBackground(Void... voids) {
                RequestHandler requestHandler = new RequestHandler();

                HashMap<String, String> params = new HashMap<>();
                params.put("caregory", s1);
                params.put("district", s2);
                params.put("description", dea);
                params.put("state", s3);
                params.put("home_address", add);
                params.put("complain_type", s4);
                params.put("user_registration_id", "9");


                return requestHandler.sendPostRequest(Urls.URL_SAVE, params);


            }

            @Override
            protected void onPreExecute() {
                super.onPreExecute();
                progressBar = (ProgressBar) findViewById(R.id.progressBar1);
                progressBar.setVisibility(View.VISIBLE);
            }

            @Override
            protected void onPostExecute(String s) {
                super.onPostExecute(s);

                progressBar.setVisibility(View.GONE);



                if(s!=null){
                    try {
                        JSONObject obj = new JSONObject(s);
                        if (!obj.getBoolean("error")) {
                            Toast.makeText(getApplicationContext(), obj.getString("message"), Toast.LENGTH_LONG).show();
                        }
                    } catch (JSONException e) {
                        e.printStackTrace();
                        Toast.makeText(Complain_register.this, "Exception: " + e, Toast.LENGTH_LONG).show();
                    }
                }else{

                }

            }
        }

        RegisterComplain ru = new RegisterComplain();
        ru.execute();

    }
}
