package com.example.php_android;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;

public class Home extends AppCompatActivity {

    Button buttontone;
    Button buttontwo;
    Button buttonthree;
    Button buttonfour;
    Button buttonfive;
    Button buttonsix;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_home);


        buttontone = (Button) findViewById(R.id.buttontone);
        buttontone.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                openNewActivity();
            }
        });

        buttontwo = (Button) findViewById(R.id.buttontwo);
        buttontwo.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                openNewActivity2();
            }
        });

        buttonthree = (Button) findViewById(R.id.buttonthree);
        buttonthree.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                openNewActivity3();
            }
        });

        buttonfour = (Button) findViewById(R.id.buttonfour);
        buttonfour.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                openNewActivity4();
            }
        });

        buttonfive = (Button) findViewById(R.id.buttonfive);
        buttonfive.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                openNewActivity5();
            }
        });

        buttonsix= (Button) findViewById(R.id.buttonsix);
        buttonsix.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                findViewById(R.id.buttonsix).setOnClickListener(new View.OnClickListener() {
                    @Override
                    public void onClick(View view) {
                        finish();
                        SharedPrefManager.getInstance(getApplicationContext()).logout();
                    }
                });
            }
        });

    }
    private void openNewActivity() {
        Intent intent = new Intent(this, Main_home.class);
        startActivity(intent);
    }

    private void openNewActivity2() {
        Intent intent = new Intent(this, TrackComplain.class);
        startActivity(intent);
    }

    private void openNewActivity3() {
        Intent intent = new Intent(this, Complain_history.class);
        startActivity(intent);
    }

    private void openNewActivity4() {
        Intent intent = new Intent(this, MapsActivity.class);
        startActivity(intent);
    }

    private void openNewActivity5() {
        Intent intent = new Intent(this, profile.class);
        startActivity(intent);
    }

}