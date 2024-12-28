using UnityEngine;
using TMPro;
using System.Collections;
using UnityEngine.Networking;


public class GetScores : MonoBehaviour
{
    public TMP_Text text;

    string url = "https://lightsandclockwork.net/tutorial/test02.php";  //change

    public string tempBuff = "Null";

    string buffer;

    // Start is called once before the first execution of Update after the MonoBehaviour is created
    void Start()
    {
        StartCoroutine(GetRequest(url));
    }

    IEnumerator GetRequest(string url)
    {
        using (UnityWebRequest UWR = UnityWebRequest.Get(url))
        {
            // Request and wait for the desired page.
            yield return UWR.SendWebRequest();

            text.text = UWR.downloadHandler.text;

        }
    }
}
